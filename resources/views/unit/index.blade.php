<div>
    <h1>DATA UNIT</h1>
    <a href="{{ route('unit.create')}}">Add Unit</a><br><br>
    <table border="1" width='250px'>
        <thead align="center">
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody align="center">
            @forelse ($list_unit as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>
                    <a href="{{ route('unit.edit', ["unit" => $u->id]) }}">Edit</a>
                    <form action="{{ route('unit.destroy', ["unit" => $u->id])}}" method="POST">
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
