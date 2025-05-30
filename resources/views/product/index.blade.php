<div>
    <h1>List Product</h1>
    <a href="{{ route('product.create') }}">Add Product</a><br><br>
    @csrf
    <table border="1">
        <thead align="center">
            <tr>
                <td>NO</td>
                <td>Nama</td>
                <td>Category</td>
                <td>Unit</td>
                <td>Selling Price</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody align="center">
            @forelse ($list_product as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->categorie->name }}</td>
                    <td>{{ $p->unit->name }}</td>
                    <td>Rp {{ number_format($p->selling_price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['product' => $p->id ]) }}">Edit</a>
                        <form action="{{ route('product.destroy', ['product' => $p->id ])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
