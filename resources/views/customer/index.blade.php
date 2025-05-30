<div>
    <h1>List Customer</h1>
    <a href="{{ route('customer.create') }}">Add Customer</a><br><br>
    <table border="1">
        <thead>
            <tr>
                <td>NO</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Address</td>
                <td>Gender</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_customer as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->phone }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->address }}</td>
                    <td>{{ $c->gender }}</td>
                    <td>
                        <a href="{{ route('customer.edit', ['customer' => $c->id ]) }}">Edit</a>
                        <form action="{{ route('customer.destroy', ['customer' => $c->id ])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
