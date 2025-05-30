<div>
    <h1>List City</h1>
    <a href="{{ route('city.create') }}">Add City</a><br><br>
    @csrf
    <table border="1">
        <thead>
            <tr>
                <td>NO</td>
                <td>Nama</td>
                <td>Province</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_city as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->province->name }}</td>
                    <td>
                        <a href="{{ route('city.edit', ['city' => $c->id ]) }}">Edit</a>
                        <form action="{{ route('city.destroy', ['city' => $c->id ])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
