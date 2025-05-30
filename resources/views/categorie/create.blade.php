<div>
    <h1>Add Province</h1>
    <form action="{{ route('categorie.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="name">Description</label>
        <input type="description" name="description" id="name">

        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('categorie.index') }}">Kembali</a>
</div>
