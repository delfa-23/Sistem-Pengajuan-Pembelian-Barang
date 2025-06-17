<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Karyawan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<h2>Update Karyawan</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label><br>
    <input type="text" name="name" value="{{ old('name', $karyawan->name) }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $karyawan->email) }}" required><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('karyawan.index') }}"><button type="button">Batal</button></a>
</form>

<style>
form {
  max-width: 500px;
  margin: 20px auto;
  background-color: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
}

h2 {
  text-align: center;
  font-family: Arial, sans-serif;
  color: #333;
}

label {
  font-weight: 600;
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
  font-size: 14px;
}

input:focus {
  outline: none;
  border-color: #2d79f3;
  box-shadow: 0 0 5px rgba(45, 121, 243, 0.3);
}

button[type="submit"],
button[type="button"] {
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
  margin-right: 10px;
  transition: background-color 0.2s ease;
}

button[type="submit"] {
  background-color: #2d79f3;
  color: white;
}

button[type="submit"]:hover {
  background-color: #1a5fd0;
}

button[type="button"] {
  background-color: #ccc;
  color: #333;
}

button[type="button"]:hover {
  background-color: #aaa;
}

div[style*="color:red"] ul {
  padding-left: 20px;
  margin-bottom: 20px;
}
</style>
