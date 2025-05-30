<div class="container">
    <h1>Edit Menu</h1>
    <form action="{{ route('province.update', ["province" => $province->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Provinsi</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $province->name }}" required><br><br>
        </div>

        <button type="submit" class="btn btn-primary">Update Provinsi</button>
    </form>
    <a href="{{ route('province.index') }}">Kembali</a>
</div>
