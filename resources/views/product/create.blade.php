<div>
    <h1>Add Product</h1>
    <form action="{{ route('product.store')}}" method="POST">
        @csrf
        <label for="name">Image</label>
        <input type="text" name="image"><br><br>

        <label for="name">Barcode</label>
        <input type="text" name="barcode"><br><br>

        <label for="name">Name</label>
        <input type="text" name="name"><br><br>

        <label for="categorie">Category</label>
        <select name="categorie_id" id="category">
            <option value="">Select Category</option>
            @foreach ($list_categorie as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select><br><br>

        <label for="unit">Unit</label>
        <select name="unit_id" id="unit">
            <option value="">Select Unit</option>
            @foreach ($list_unit as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select><br><br>

        <label for="selling">Selling_Price</label>
        <input type="text" name="selling_price">
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('product.index') }}">Back</a>
</div>
