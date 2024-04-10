<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Cart2 extends Model
{
	public $items = null;  //$items là mảng liên hợp, cụ thể $items=array("product_id"=>array("qty","price","item")); ->item lại là 1 mảng Product
	public $totalQty = 0;
	public $totalPrice = 0;
	//thêm 1 mặt hàng item có id cụ thể vào giỏ hàng
	public function add($item, $id)
	{
		$mathang = ['qty' => 0, 'price' => $item->promotion_price == 0 ? $item->unit_price : $item->promotion_price, 'item' => $item];
		//$mathang: lưu số lượng, tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//qty: số lượng của 1 item (mặt hàng) trong giỏ hàng
		//price: tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//item: là mặt hàng trong giỏ hàng
		if ($this->items) { //nếu items != null tức có mặt hàng trong cart thì
			if (array_key_exists($id, $this->items)) { //array_key_exists() là hàm kiểm tra id của item (mặt hàng) được thêm vào đã có trong giỏ hàng chưa? nếu có thì lấy về item(mặt hàng) có id này rồi lưu vào biến $mathang 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty']++;  //tăng số lượng của item vừa thêm lên 1
		$mathang['price'] = $item->promotion_price == 0 ? $item->unit_price : $item->promotion_price * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty++;
		$this->totalPrice += ($item->promotion_price == 0 ? $item->unit_price : $item->promotion_price);
	}

	//thêm nhiều mặt hàng item có số lượng soluong có id cụ thể vào giỏ hàng
	public function addMany($item, $id, $soluong)
	{
		$mathang = ['qty' => 0, 'price' => $item->promotion_price == 0 ? $item->unit_price : $item->promotion_price, 'item' => $item];
		//$mathang: lưu số lượng, tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//qty: số lượng của 1 item (mặt hàng) trong giỏ hàng
		//price: tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//item: là mặt hàng trong giỏ hàng
		if ($this->items) { //nếu items != null tức có mặt hàng trong cart thì
			if (array_key_exists($id, $this->items)) { //array_key_exists() là hàm kiểm tra id của item (mặt hàng) được thêm vào đã có trong giỏ hàng chưa? nếu có thì lấy về item(mặt hàng) có id này rồi lưu vào biến $mathang 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty'] = $mathang['qty'] + $soluong;  //tăng số lượng của item vừa thêm lên số lượng
		$mathang['price'] = ($item->promotion_price == 0 ? $item->unit_price : $item->promotion_price) * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty += $soluong;
		$this->totalPrice += ($item->promotion_price == 0 ? $item->unit_price : $item->promotion_price) * $soluong;
	}
	//xóa 1
	public function reduceByOne($id)
	{
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if ($this->items[$id]['qty'] <= 0) {
			unset($this->items[$id]);  //hàm unset(): xóa giá trị của biến
		}
	}
	//xóa nhiều
	public function removeItem($id)
	{
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

	public function delCartItem($id)
	{
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart2($oldCart);
		$cart->removeItem($id);
		if (count($cart->items) > 0) {
			Session::put('cart', $cart);
		} else Session::forget('cart');
		return redirect()->back();
	}

	public function updateQty($id, $qty)
    {
        if ($this->items && array_key_exists($id, $this->items)) {
            $giohang = $this->items[$id];
            $giohang['qty'] = $qty;
            $giohang['price'] = $giohang['item']->unit_price * $qty;
            $this->items[$id] = $giohang;
            $this->calculateTotal();
        }
    }

    private function calculateTotal()
    {
        $this->totalQty = 0;
        $this->totalPrice = 0;

        foreach ($this->items as $giohang) {
            $this->totalQty += $giohang['qty'];
            $this->totalPrice += $giohang['price'];
        }
    }
}
