<div>
    <h1>Add Unit</h1>
    <form action="{{ route('unit.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('unit.index') }}">Back</a>
</div>
