<x-admin-layout :title="'Carousel Management'">
    <x-slot:head>
        @vite(['resources/css/adminside/carousel.css', 'resources/js/adminside/carousel.js'])
    </x-slot:head>

    <!-- Main Content -->
    <div class="main">
        <div class="page-heading">
            <p class="page-eyebrow">Admin · Content Management</p>
            <h1>Homepage Carousel Management</h1>
        </div>

        <div class="card-stack">
            @if (count($files) < 5)
                <section class="info-card">
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Upload New Slide</p>
                            <h2>Add Carousel Image</h2>
                            <p class="section-description">
                                Upload a new image to display on the homepage carousel. Supported formats: JPEG, PNG.
                                Max size: 2MB.
                                <span class="carousel-status-count">{{ count($files) }} / 5 Slides Used</span>
                            </p>
                        </div>
                    </header>

                    <div class="section-body">
                        <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data"
                            class="upload-form">
                            @csrf
                            <div class="form-group">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file" name="image" id="image" class="file-input" accept="image/*"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Slide</button>
                        </form>
                    </div>
                </section>
            @else
                <section class="info-card">
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Upload Limit Reached</p>
                            <h2>Maximum Slides Reached</h2>
                            <p class="section-description">
                                You have reached the maximum of 5 carousel slides. Delete or replace an existing slide
                                to add a new one.
                                <span class="carousel-status-count">{{ count($files) }} / 5 Slides Used</span>
                            </p>
                        </div>
                    </header>
                </section>
            @endif

            <section class="info-card" data-collapsible>
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Current Slides</p>
                        <h2>Carousel Images</h2>
                        <p class="section-description">
                            Manage your homepage carousel slides. Replace existing images or delete them if no longer
                            needed.
                            <span class="carousel-status-count">{{ count($files) }} / 5 Slides Used</span>
                        </p>
                    </div>
                    <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="true">
                        <span data-toggle-label>Hide details</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            class="chevron-icon" data-toggle-icon>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                </header>

                <div class="section-body" data-collapsible-content>
                    <div class="attachment-grid">
                        @forelse($files as $file)
                            @php
                                $url = route('admin.viewFile', ['path' => $file]);
                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                // Display full filename (e.g., banner_1.png, banner_2.png)
                                $displayFileName = basename($file);
                            @endphp
                            <article class="attachment-card">
                                <header class="attachment-card-header">
                                    <h3>{{ $displayFileName }}</h3>
                                    <span class="attachment-badge">{{ strtoupper($ext) }}</span>
                                </header>
                                <div class="attachment-preview">
                                    <img src="{{ $url }}" alt="{{ $displayFileName }} preview">
                                </div>
                                <div class="attachment-actions">
                                    <form action="{{ route('admin.carousel.store') }}" method="POST"
                                        enctype="multipart/form-data" class="replace-form"
                                        style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="replace_path" value="{{ $file }}">
                                        <input type="file" name="image" class="replace-input" accept="image/*"
                                            required style="display: none;" onchange="this.form.submit()">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="this.previousElementSibling.click()">Replace</button>
                                    </form>
                                    <form action="{{ route('admin.carousel.destroy') }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this slide?');"
                                        style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $file }}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <p class="empty-state">No slides uploaded yet. The homepage will display default images or
                                nothing depending on configuration.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
