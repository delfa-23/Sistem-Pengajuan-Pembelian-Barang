<div>
    <h1>Add City</h1>
    <form action="{{ route('city.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name"><br><br>

        <label for="province">Province</label>
        <select name="province_id" id="province">
            <option value="">Pilih Province</option>
            @foreach ($list_province as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('city.index') }}">Back</a>
</div>
