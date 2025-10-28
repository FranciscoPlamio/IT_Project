<nav>
    <button class="menu-toggle" id="menuToggle">☰</button>
    <ul id="navList">
        <li class="{{ Route::is('homepage') ? 'active' : '' }}">
            <a href="{{ url('/') }}">Home</a>
        </li>
        {{-- {{ dd(Route::currentRouteName()) }} --}}
        <li class="{{ Route::is('display.forms') ? 'active' : '' }}">
            <a href="{{ route('display.forms') }}">Apply</a>
        </li>
        <li>
            <a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank"
                rel="noopener">News</a>
        </li>
        <li>
            <a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank"
                rel="noopener">About us</a>
        </li>
        <li>
            <a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/"
                target="_blank" rel="noopener">Contact us</a>
        </li>
        @if (session('email_verified'))
            <li class="{{ Route::is('transactions.index') ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}">Transactions</a>
            </li>
        @endif
        <!-- temp menu -->
        <li class="{{ request()->routeIs('admin.login') ? 'active' : '' }}">
            <a id="navAdmin" href="{{ route('admin.login') }}">Adminside</a>
        </li>

    </ul>
</nav>
