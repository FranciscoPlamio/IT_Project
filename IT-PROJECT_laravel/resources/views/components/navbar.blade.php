<nav>
    <button class="menu-toggle" id="menuToggle">☰</button>
    <ul id="navList">
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank"
                rel="noopener">News</a></li>
        <li><a href="{{ route('forms.display') }}">Forms</a></li>
        <li><a id="navApplyLink" href="{{ route('email-auth') }}">Apply</a></li>
        <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank"
                rel="noopener">About us</a></li>
        <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/"
                target="_blank" rel="noopener">Contact us</a></li>
    </ul>
</nav>
