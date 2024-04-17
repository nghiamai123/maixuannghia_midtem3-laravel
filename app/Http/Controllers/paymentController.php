<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }
    public function paymentMomo(Request $request)
    {
        // dd($request);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Tại đây là Thông tin đơn hàng";
        $amount = $request->amount; // Chuyển đổi chuỗi thành số nguyên
        $orderId = time() . mt_rand(1000, 9999);
        $redirectUrl = "http://127.0.0.1:8000/cart/checkout?ordered";
        $ipnUrl = "http://127.0.0.1:8000/cart/checkout?ordered";
        $extraData = "";

        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId;
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        // dd(json_encode($data));
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd($result);
        $jsonResult = json_decode($result, true);
        // dd($jsonResult);
        if (isset($jsonResult['payUrl'])) {
            return redirect()->away($jsonResult['payUrl']);
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        $oldCart = Session('cart'); //session cart được tạo trong method addToCart của PageController
        $cart = $oldCart;
        return view("history-booking", ['cart' => Session('cart'), 'productCarts' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function getCheckout()
    {
        return view('checkout');
    }

    public function postCheckout(Request $request)
    {
        if ($request->input('payment_method') != "VNPAY") {
            $cart = Session('cart');
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->gender = $request->input('gender');
            $customer->email = $request->input('email');
            $customer->address = $request->input('address');
            $customer->phone_number = $request->input('phone_number');
            $customer->note = $request->input('notes');
            $customer->save();
    
            $bill = new Bill();
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $request->input('payment_method');
            $bill->note = $request->input('notes');
            $bill->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail = new BillDetail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = $value['price'] / $value['qty'];
                $bill_detail->save();
            }
            Session(['cart' => null]);;
            return redirect('/getHistory')->with('message', 'Đặt hàng thành công');
        } else { //nếu thanh toán là vnpay
            $cart = Session('cart');
            return view('/vnpay-index', compact('cart'));
        }
    }

    public function getHistory()
    {
        $h_booking = DB::table('customer')
        ->join('bills', 'customer.id', '=', 'bills.id_customer')
        ->join('bill_detail', 'bills.id', '=', 'bill_detail.id_bill')
        ->select('*')
        ->get();
        // dd($h_booking);
        return view('history-booking', ['cartHistory' => $h_booking]);
    }
}
