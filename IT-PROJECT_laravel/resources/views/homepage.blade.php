<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NTC CAR Baguio</title>
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
        <li class="active"><a href="{{ route('homepage') }}" style="text-decoration:none;color:inherit;">Home</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">About us</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">News</a></li>
        <li><a href="#" style="text-decoration:none;color:inherit;">Contact us</a></li>
        <li><a href="{{ route('forms.showcase') }}">Showcase Forms</a></li>
      </ul>
    </nav>
  </header>

  <section class="banner">
    <img src="{{ asset('images/banner-image.png') }}" alt="Campaign Banner" />
  </section>

  <section class="quick-links">
    <div class="card">
      <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon"/>
      <p>Schedules</p>
    </div>
    <div class="card">
      <a href="{{ route('email-auth') }}" style="display:block;text-decoration:none;color:inherit;">
        <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon"/>
        <p>List of Forms</p>
      </a>
    </div>
    <div class="card">
      <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon"/>
      <p>Requirements</p>
    </div>
  </section>

  <section class="news">
    <h2>CURRENT NEWS</h2>

    <div class="news-item">
      <img src="{{ asset('images/news-icon.png') }}" alt="News Icon" class="news-icon">
      <div class="news-content">
        <h3>Announcement</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a fringilla velit...</p>
        <a href="#">Read more</a>
      </div>
    </div>

    <div class="news-item">
      <img src="{{ asset('images/news-icon.png') }}" alt="News Icon" class="news-icon">
      <div class="news-content">
        <h3>Announcement</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a fringilla velit...</p>
        <a href="#">Read more</a>
      </div>
    </div>
  </section>

  <script>
    const toggle = document.getElementById("menuToggle");
    const navList = document.getElementById("navList");

    toggle.addEventListener("click", () => {
      navList.classList.toggle("open");
    });
  </script>
</body>
</html>
