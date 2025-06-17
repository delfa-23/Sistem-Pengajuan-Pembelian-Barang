<head>
    <title>Login - Aplikasi Pengajuan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="page-container">
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <a href="{{ route('admin.login') }}" class="admin-btn">
    <img src="{{ asset('images/admin.png') }}" alt="Admin Icon" class="admin-icon">
    Admin
</a>
</div>

<h1>Login User</h1>
<form class="form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex-column">
      <label>Email </label></div>
      <div class="inputForm">
        <img src="{{ asset('images/email.png') }}" alt="Email Icon" style="height: 20px; width: 20px; margin-left: 10px;">
        <input type="email" id="email" class="input" placeholder="Enter your Email" name="email" required>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="inputForm" style="position: relative;">
        <img src="{{ asset('images/password.png') }}" alt="Password Icon" style="height: 20px; width: 20px; margin-left: 10px;">
        <input type="password" id="password" class="input" name="password" placeholder="Enter your Password" required style="padding-right: 40px;">

        <img
          id="togglePassword"
          src="{{ asset('images/eye-close.png') }}"
          alt="Toggle Password"
          style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; height: 20px; width: 20px;"
        >

        @error('password')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>


    <button class="button-submit">Login</button>
    <p class="p">Don't have an account? <a class="span" href="{{ route('register') }}">Register here</a>


        <div style="text-align: center;">
          <a href="{{ route('landing') }}" class="bubbles"><span class="text">Back To Landing Page</span></a>
        </div>


    </form>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti gambar toggle
            if(type === 'text') {
            this.src = "{{ asset('images/eye-open.png') }}";
            } else {
            this.src = "{{ asset('images/eye-close.png') }}";
            }
        });
    </script>


</div>

<style>
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: #ffffff;
  padding: 30px;
  width: 100%;
  max-width: 450px;
  box-sizing: border-box;
  border-radius: 20px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

::placeholder {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form button {
  align-self: flex-end;
}

.flex-column > label {
  color: #151717;
  font-weight: 600;
}
.page-container {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: #f9f9f9;
}

.inputForm {
  border: 1.5px solid #ecedec;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}

.input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
}

.input:focus {
  outline: none;
}

.inputForm:focus-within {
  border: 1.5px solid #2d79f3;
}

.flex-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  justify-content: space-between;
}

.flex-row > div > label {
  font-size: 14px;
  color: black;
  font-weight: 400;
}
.admin-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  background-color: #ffc107; /* Bootstrap's warning color */
  color: #000;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: background-color 0.2s ease;
}

.admin-btn:hover {
  background-color: #e0a800;
}

.admin-icon {
  height: 20px;
  width: 20px;
  object-fit: contain;
}

.span {
  font-size: 14px;
  margin-left: 5px;
  color: #2d79f3;
  font-weight: 500;
  cursor: pointer;
}
.btn-landing {
  display: inline-block;
  padding: 12px 25px;
  background-color: #151717; /* Hitam gelap */
  color: white;
  border-radius: 10px;
  text-decoration: none;
  font-weight: 600;
  font-size: 15px;
  transition: background-color 0.3s ease;
  cursor: pointer;
}

.btn-landing:hover {
  background-color: #252727;
}

.button-submit {
  margin: 20px 0 10px 0;
  background-color: #151717;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 100%;
  cursor: pointer;
}
.span {
    font-size: 14px;
    margin-left: 5px;
    color: #2d79f3;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
  }
  .span:hover {
    text-decoration: underline;
  }
.button-submit:hover {
  background-color: #252727;
}
.bubbles-container {
  display: flex;
  gap: 20px;
  max-width: 600px;
  margin: 0 auto;
}

.bubbles {
  --c1: #ffffff;
  --c2: #000000;
  --size-letter: 18px;
  padding: 0.5em 1em;
  font-size: var(--size-letter);
  font-weight: 700;
  color: var(--c2);
  background-color: transparent;
  border: calc(var(--size-letter) / 6) solid var(--c2);
  border-radius: 0.2em;
  cursor: pointer;
  overflow: hidden;
  position: relative;
  transition: 300ms cubic-bezier(0.83, 0, 0.17, 1);
  flex: 1; /* supaya tombol bagi rata */
  text-align: center;
}

.bubbles .text {
  position: relative;
  z-index: 1;
  transition: color 700ms cubic-bezier(0.83, 0, 0.17, 1);
}

.bubbles::before,
.bubbles::after {
  content: "";
  width: 150%;
  aspect-ratio: 1/1;
  scale: 0;
  transition: 1000ms cubic-bezier(0.76, 0, 0.24, 1);
  background-color: var(--c2);
  border-radius: 50%;
  position: absolute;
  translate: -50% -50%;
  z-index: 0;
}

.bubbles::before {
  top: 0;
  left: 0;
}

.bubbles::after {
  top: 100%;
  left: 100%;
}

.bubbles:hover {
  color: var(--c1);
}

.bubbles:hover::before,
.bubbles:hover::after {
  scale: 1;
}

.bubbles:active {
  scale: 0.98;
  filter: brightness(0.9);
}
.bubbles {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none; /* hilangkan underline link */
  user-select: none;
}

.p {
  text-align: center;
  color: black;
  font-size: 14px;
  margin: 5px 0;
}

.btn {
  margin-top: 10px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  gap: 10px;
  border: 1px solid #ededef;
  background-color: white;
  cursor: pointer;
  transition: 0.2s ease-in-out;
}

.btn:hover {
  border: 1px solid #2d79f3;
  ;
}


</style>
