@props(['formHeader ' => null])

<div class="top-bar">
    <a href="{{ route('homepage') }}" aria-label="Go to homepage">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
    </a>
    <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City
                Philippines</span></h1>
    </div>

    @if ($formHeader)
        <!-- form name in the side of the header it may vary depending on the form -->
        <div style="position:absolute;top:20px;right:40px;text-align:right;font-size:0.97rem;">
            <div><b>Form No.</b> <u>{{ $formHeader['formNo'] }}</u></div>
            <div><b>Revision No.</b> <u>{{ $formHeader['revisionNo'] }}</u></div>
            <div><b>Revision Date</b> <u>{{ $formHeader['revisionDate'] }}</u></div>
        </div>
    @endif
</div>
