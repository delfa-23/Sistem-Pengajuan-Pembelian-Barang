<div class="container">
    <h1>Edit Unit</h1>
    <form action="{{ route('unit.update', ["unit" => $unit->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Unit</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $unit->name }}" required><br><br>
        </div>

        <button type="submit" class="btn btn-primary">Update Unit</button>
    </form>
    <a href="{{ route('unit.index') }}">Back</a>
</div>
