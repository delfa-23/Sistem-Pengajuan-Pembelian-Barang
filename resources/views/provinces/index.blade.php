<div>
    <h1>DATA PROVINCE</h1>
    <a href="{{ route('province.create')}}">Add Province</a><br><br>
    <table border="1" width='250px'>
        <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_province as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>
                    <a href="{{ route('province.edit', ["province" => $p->id]) }}">Edit</a>
                    <form action="{{ route('province.destroy', ["province" => $p->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
