<x-layout>
    <!-- Body -->
    <section class="banner">
        <img src="{{ asset('images/ntc-home.png') }}" alt="Campaign Banner" />
    </section>

    <section class="quick-links">
        <a href="https://ntc.gov.ph/examination-schedule-2025/" target="_blank" rel="noopener"
            style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon" />
                <p>Schedules</p>
            </div>
        </a>
        <a id="applyLink" href="{{ route('email-auth') }}" class="card" style="text-decoration:none;color:inherit;">
            <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon" />
            <p>Apply</p>
        </a>
        <a href="{{ route('requirements') }}" style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon" />
                <p>Requirements</p>
            </div>
        </a>
    </section>

</x-layout>
