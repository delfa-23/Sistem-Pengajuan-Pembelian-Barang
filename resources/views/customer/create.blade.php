<div>
    <h1>Add Customer</h1>
    <form action="{{ route('customer.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name"><br><br>
        <label for="name">Phone</label>
        <input type="text" name="phone"><br><br>
        <label for="name">Email</label>
        <input type="text" name="email"><br><br>
        <label for="name">Address</label>
        <input type="text" name="address"><br><br>

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="">Pilih Gender</option>
            @foreach (['pria','wanita'] as $gender)
                <option value="{{ $gender }}">{{ strtoupper($gender) }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('customer.index') }}">Back</a>
</div>
