<div class="container">
    <h1>Edit Menu</h1>
    <form action="{{ route('categorie.update', ["categorie" => $categorie->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $categorie->name }}" required><br><br>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="description" class="form-control" id="name" name="description" value="{{ $categorie->description }}" required><br><br>
        </div>

        <button type="submit" class="btn btn-primary">Update Provinsi</button>
    </form>
    <a href="{{ route('categorie.index') }}">Kembali</a>
</div>
