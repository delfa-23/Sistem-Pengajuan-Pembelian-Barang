<form action="{{ route('post.store') }}" method="POST">
  @csrf
  <div>
    <label for="title">Judul</label><br>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    @error('title')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="body">Isi</label><br>
    <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
    @error('body')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <button type="submit">Simpan</button>
  <a href="{{ route('post.index') }}" class="back-btn">← Kembali</a>
</form>

<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f4f6f8;
    padding: 40px;
  }

  form {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
  }

  textarea {
    resize: vertical;
  }

  button[type="submit"] {
    background-color: #3498db;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #2980b9;
  }

  .back-btn {
    display: inline-block;
    margin-left: 15px;
    font-size: 14px;
    color: #3498db;
    text-decoration: none;
    padding: 10px;
  }

  .back-btn:hover {
    text-decoration: underline;
  }

  p {
    margin-top: -15px;
    margin-bottom: 15px;
    color: red;
    font-size: 13px;
  }
</style>
