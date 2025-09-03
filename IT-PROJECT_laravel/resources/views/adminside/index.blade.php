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

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <label for="employee-id">Employee ID</label>
                <input type="text" id="employee-id" name="employee_id" placeholder="Enter your ID" required>

                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="••••••••••••••" required>
                    <span><img src="{{ asset('images/eye.png') }}" alt="eye icon"></span>
                </div>

                <button type="submit">SIGN IN</button>
            </form>
        </div>
    </div>
</body>
</html>
