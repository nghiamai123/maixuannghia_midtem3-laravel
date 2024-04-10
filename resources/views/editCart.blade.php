<form action="{{ route('storeEdit', $Id) }}" method="">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" id="qty" min="1">
    </div>
    <button type="submit">Update</button>
</form>