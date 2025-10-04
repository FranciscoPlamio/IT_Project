<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC Online System</title>
    @vite(['resources/css/adminside/index.css', 'resources/js/adminside/index.js'])
</head>
<body>
    <!-- Left -->
    <div class="left">
        <img src="{{ asset('/images/ntc-logo.png') }}" alt="NTC Logo">
        <h2>NTC Online System</h2>
    </div>

    <!-- Right -->
    <div class="right">
        <div class="form-container">
            <h1 id="welcome-text"></h1>
            <p>Please enter your details.</p>

<!-- {{-- Show Laravel validation errors --}} -->
@if ($errors->any())
    <div style="color:red; margin-bottom:10px; margin-left:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Show manual error (invalid credentials) --}}
@if(session('error'))
    <div style="color:red; margin-bottom:10px; margin-left:15px;">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>

    <label for="password">Password</label>
    <div class="password-container">
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <span>
            <img src="{{ asset('images/eye.png') }}" alt="eye icon" id="toggle-password" style="cursor:pointer;">
        </span>
    </div>

    <button type="submit">SIGN IN</button>
</form>


        </div>
    </div>
</body>
</html>
