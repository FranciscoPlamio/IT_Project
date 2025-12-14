<x-admin-layout :title="'Payment QR Management'">
    <x-slot:head>
        @vite(['resources/css/adminside/payment-QR.css', 'resources/js/adminside/payment-QR.js'])
    </x-slot:head>

    <!-- Main Content -->
    <div class="main">
        <div class="page-heading">
            <p class="page-eyebrow">Admin · Content Management</p>
            <h1>Payment QR Code Management</h1>
        </div>

        <div class="card-stack">
            @if ($fileCount < 1)
                <section class="info-card">
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Upload New QR Code</p>
                            <h2>Add Payment QR Code</h2>
                            <p class="section-description">
                                Upload a new QR code image to display on payment transaction pages. Supported formats:
                                JPEG,
                                PNG.
                                Max size: 2MB.
                                <span class="carousel-status-count">{{ $fileCount }} / 1 QR Code Used</span>
                            </p>
                        </div>
                    </header>

                    <div class="section-body">
                        <form action="{{ route('admin.payment-qr.store') }}" method="POST"
                            enctype="multipart/form-data" class="upload-form">
                            @csrf
                            <div class="form-group">
                                <label for="image" class="form-label">Select QR Code Image</label>
                                <input type="file" name="image" id="image" class="file-input" accept="image/*"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload QR Code</button>
                        </form>
                    </div>
                </section>
            @else
                <section class="info-card">
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Upload Limit Reached</p>
                            <h2>Maximum QR Code Reached</h2>
                            <p class="section-description">
                                You have reached the maximum of 1 payment QR code. Delete or replace the existing QR
                                code
                                to add a new one.
                                <span class="carousel-status-count">{{ $fileCount }} / 1 QR Code Used</span>
                            </p>
                        </div>
                    </header>
                </section>
            @endif

            <section class="info-card" data-collapsible>
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Current QR Code</p>
                        <h2>Payment QR Code</h2>
                        <p class="section-description">
                            Manage your payment QR code. Replace the existing image or delete it if no longer needed.
                            <span class="carousel-status-count">{{ $fileCount }} / 1 QR Code Used</span>
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
                    @if ($file)
                        @php
                            $url = route('admin.viewFile', ['path' => $file]);
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $displayFileName = basename($file);
                        @endphp
                        <div class="attachment-grid">
                            <article class="attachment-card">
                                <header class="attachment-card-header">
                                    <h3>{{ $displayFileName }}</h3>
                                    <span class="attachment-badge">{{ strtoupper($ext) }}</span>
                                </header>
                                <div class="attachment-preview">
                                    <img src="{{ $url }}" alt="{{ $displayFileName }} preview">
                                </div>
                                <div class="attachment-actions">
                                    <form action="{{ route('admin.payment-qr.store') }}" method="POST"
                                        enctype="multipart/form-data" class="replace-form"
                                        style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="replace_path" value="{{ $file }}">
                                        <input type="file" name="image" class="replace-input" accept="image/*"
                                            required style="display: none;" onchange="this.form.submit()">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="this.previousElementSibling.click()">Replace</button>
                                    </form>
                                    <form action="{{ route('admin.payment-qr.destroy') }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this QR code?');"
                                        style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $file }}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </article>
                        </div>
                    @else
                        <p class="empty-state">No QR code uploaded yet. The payment page will display the default QR
                            code image.</p>
                    @endif
                </div>
            </section>
            <section class="info-card">
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Admin Activity Logs</p>
                        <h2>QR Code Changes</h2>
                        <p class="section-description">
                            See which admin uploaded, replaced, or deleted QR codes, along with the timestamp.
                        </p>
                    </div>
                </header>

                <div class="section-body">
                    <div class="table-container1">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Admin Email</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    <tr>
                                        <td>{{ $log->admin->email ?? 'Unknown Admin' }}</td>
                                        <td>{{ ucfirst($log->action ?? 'N/A') }}</td>
                                        <td>{{ $log->created_at ? $log->created_at->format('Y-m-d H:i:s') : 'N/A' }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="empty-state">No activity logs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-admin-layout>
