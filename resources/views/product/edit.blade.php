<div>
    <h1>Edit Product</h1>
    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="image">Image</label>
        <input type="text" name="image" value="{{ $product->image }}"><br><br>

        <label for="barcode">Barcode</label>
        <input type="text" name="barcode" value="{{ $product->barcode }}"><br><br>

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $product->name }}"><br><br>

        <label for="categorie">Category</label>
        <select name="categorie_id" id="category">
            <option value="">Select Category</option>
            @foreach ($list_category as $c)
                <option value="{{ $c->id }}" @if ($product->categorie_id == $c->id)
                    selected
                @endif>{{ $c->name }}</option>
            @endforeach
        </select><br><br>

        <label for="unit">Unit</label>
        <select name="unit_id" id="unit">
            <option value="">Select Unit</option>
            @foreach ($list_unit as $u)
                <option value="{{ $u->id }}" @if ($product->unit_id == $u->id)
                    selected
                @endif>{{ $u->name }}</option>
            @endforeach
        </select><br><br>

        <label for="selling_price">Selling Price</label>
        <input type="text" name="selling_price" value="{{ $product->selling_price }}"><br><br>

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('product.index') }}">Back</a>
</div>
