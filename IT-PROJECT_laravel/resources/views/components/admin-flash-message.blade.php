@if (session('message'))
    <div class="flash-message fixed top-0 left-0 w-full z-50">
        <div class="flash-content">
            {{ session('message') }}
            <button class="flash-close" onclick="this.parentElement.parentElement.style.display='none';">&times;</button>
        </div>
    </div>
@endif
