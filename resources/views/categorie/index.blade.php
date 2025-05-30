<div>
    <h1>Categorie</h1>
    <a href="{{ route('categorie.create')}}">Add Categorie</a><br><br>
    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_categorie as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->description }}</td>
                <td>
                    <a href="{{ route('categorie.edit', ["categorie" => $c->id]) }}">Edit</a>
                    <form action="{{ route('categorie.destroy', ["categorie" => $c->id])}}" method="POST">
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
