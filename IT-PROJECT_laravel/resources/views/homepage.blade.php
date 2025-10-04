<x-layout>
    <!-- Body -->
    <section class="banner">
        <img src="{{ asset('images/ntc-home.png') }}" alt="Campaign Banner" />
    </section>

    <section class="quick-links">
        <a href="https://car.ntc.gov.ph/category/announcements/examination/schedule/" target="_blank" rel="noopener"
            style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon" />
                <p>Schedules</p>
            </div>
        </a>
        <div class="card">
            <a id="applyLink" href="{{ route('email-auth') }}"
                style="display:block;text-decoration:none;color:inherit;">
                <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon" />
                <p>Apply</p>
            </a>
        </div>
        <a href="https://car.ntc.gov.ph/wp-content/uploads/2025/05/NTC-CAR-Citizens-Charter-2025.png" target="_blank"
            rel="noopener" style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon" />
                <p>Requirements</p>
            </div>
        </a>
    </section>

</x-layout>
