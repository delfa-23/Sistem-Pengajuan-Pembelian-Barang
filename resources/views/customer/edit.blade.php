<div>
    <h1>Edit</h1>
    <form action="{{ route('customer.update', ['customer' => $customer->id])}}" method="POST">
        @method('PUT')
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $customer->name }}" required><br><br>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $customer->phone }}" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $customer->email }}" required><br><br>
        <label>Address:</label>
        <input type="text" name="address" value="{{ $customer->address }}" required><br><br>
        <label>Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
                <option value="pria" @if ($customer->gender == 'pria')
                    selected
                @endif>Pria</option>
                <option value="wanita" @if ($customer->gender == 'wanita')
                    selected
                @endif>Wanita</option>
        </select><br><br>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('customer.index')}}">Back</a>
</div>
