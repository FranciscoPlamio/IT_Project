<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <title>NTC CAR Baguio</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <a href="{{ route('homepage') }}" aria-label="Go to homepage">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      </a>
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
      </div>
    </div>

    <nav>
      <button class="menu-toggle" id="menuToggle">☰</button>
      <ul id="navList">
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank" rel="noopener">News</a></li>
        <li><a href="{{ route('forms.display') }}">Forms</a></li>
        <li><a id="navApplyLink" href="{{ route('email-auth') }}">Apply</a></li>
        <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank" rel="noopener">About us</a></li>
        <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/" target="_blank" rel="noopener">Contact us</a></li>
      </ul>
    </nav>
  </header>

  <section class="banner">
    <img src="{{ asset('images/ntc-home.png') }}" alt="Campaign Banner" />
  </section>

  <section class="quick-links">
    <a href="https://car.ntc.gov.ph/category/announcements/examination/schedule/" target="_blank" rel="noopener" style="text-decoration:none;color:inherit;">
      <div class="card">
        <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon"/>
        <p>Schedules</p>
      </div>
    </a>
    <div class="card">
      <a id="applyLink" href="{{ route('email-auth') }}" style="display:block;text-decoration:none;color:inherit;">
        <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon"/>
        <p>Apply</p>
      </a>
    </div>
    <a href="https://car.ntc.gov.ph/wp-content/uploads/2025/05/NTC-CAR-Citizens-Charter-2025.png" target="_blank" rel="noopener" style="text-decoration:none;color:inherit;">
      <div class="card">
        <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon"/>
        <p>Requirements</p>
      </div>
    </a>
  </section>


  <section class="news">
    <h2>CURRENT NEWS</h2>

    <div class="news-item">
      <img src="{{ asset('images/news-icon.png') }}" alt="News Icon" class="news-icon">
      <div class="news-content">
        <h3>PCC, NTC sign pact to promote fair competition in data transmission industry</h3>
        <h5>Published September 19, 2025 8:29pm</h5>
        <p>"The Philippine Competition Commission (PCC) and the National Telecommunications Commission (NTC) have signed a pact to promote fair competition and regulatory...</p>
        <a href="https://www.gmanetwork.com/news/topstories/nation/959736/pcc-ntc-sign-pact-to-promote-fair-competition-in-data-transmission-industry/story/">Read more</a>
      </div>
    </div>

    <div class="news-item">
      <img src="{{ asset('images/news-icon.png') }}" alt="News Icon" class="news-icon">
      <div class="news-content">
        <h3>NTC adopts NorMin broadband mapping system for nationwide use</h3>
        <h5>Published August 26, 2025, 6:51 pm</h5>
        <p>The National Telecommunications Commission (NTC) launched the nationwide broadband mapping system here on Tuesday, developed by engineers and information technology professionals from Northern Mindanao...</p>
        <a href="https://www.pna.gov.ph/articles/1257367">Read more</a>
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
