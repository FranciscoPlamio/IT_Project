<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Email Authentication</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>CAR, Baguio City Philippines</span></h1>
      </div>
    </div>
    <nav>
      <button class="menu-toggle" id="menuToggle">☰</button>
      <ul id="navList">
        <li class="active"><a href="{{ route('homepage') }}on:none;color:inherit;">Home</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">About us</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">News</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">Contact us</a></li>
        <li><a href="{{ route('forms.showcase') }}">Showcase Forms</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="email-auth-container">
      <h2>Enter your E-mail</h2>
      <p>Please provide the information.</p>
      <form class="email-auth-form" id="emailAuthForm" data-redirect-url="{{ route('forms.list') }}">
        <label class="email-auth-label" for="email">Email address</label>
        <input class="email-auth-input" type="email" id="email" name="email" placeholder="Enter your email" required />
        <button class="email-auth-btn" type="submit">Continue</button>
      </form>
      <a class="email-auth-resend" href="#">Resend</a>
      <div id="auth-success" style="display:none; margin-top:24px;">
        <p style="color:#22b573;font-weight:600;">Email authenticated! Proceed to the forms list:</p>
        <a href="{{ route('forms.list') }}" class="email-auth-btn" style="display:inline-block;width:auto;padding:10px 32px;">Go to Forms List</a>
      </div>
    </div>
  </main>

</body>
</html>