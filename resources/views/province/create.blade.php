<div>
    <h1>Add Province</h1>
    <form action="{{ route('province.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('province.index') }}">Kembali</a>
</div>
