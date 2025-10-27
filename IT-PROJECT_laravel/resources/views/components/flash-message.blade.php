@if (session()->has('message'))
    <div id="top-banner" class="fixed top-0 text-lg w-full bg-blue-500 text-white text-center p-8 shadow-md z-10">
        <p>{{ session('message') }}</p>
    </div>
@endif
