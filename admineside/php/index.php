<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC Online System</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <!-- Left -->
    <div class="left">
        <img src="images/NTClogo.png" alt="NTC Logo">
        <h2>NTC Online System</h2>
    </div>

    <!-- Right -->
    <div class="right">
        <div class="form-container">
            <h1 id="welcome-text"></h1>
            <p>Please enter your details.</p>
            
            <label for="employee-id">Employee ID</label>
            <input type="text" id="employee-id" placeholder="Enter your ID">
            
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" placeholder="••••••••••••••">
                <span><img src="images/eye.png" alt="eye icon"></span>
            </div>
            
            <button>SIGN IN</button>
        </div>
    </div>

    <script src="javascript/index.js"></script>
</body>
</html>
