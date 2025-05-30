<div>
    <h1>Edit</h1>
    <form action="{{ route('city.update', ['city' => $city->id])}}" method="POST">
        @method('PUT')
        @csrf
        <label for="name">City Name</label>
        <input type="text" name="name" value="{{ $city->name}}">

        <label for="province">Province</label>
        <select name="province_id" id="province">
            <option value="">Pilih Province</option>
            @foreach ($list_province as $p)
                <option value="{{ $p->id }}" @if ($city->province_id == $p->id)
                    selected
                @endif>{{ $p->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('city.index')}}">Back</a>
</div>
