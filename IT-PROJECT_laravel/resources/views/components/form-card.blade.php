@props([
    'title' => '',
    'formType' => '',
    'image' => '',
    'pdf' => '',
])

<div class="form-card">
    <img src="{{ asset($image ?: 'images/Form1-01_image.png') }}" alt="{{ $title }}"
        style="display:block;width:100%;height:auto;">

    <div class="form-card-caption">
        <span class="form-card-title" style="pointer-events:none">{{ $title }}</span>

        <div style="margin-top:10px; display:flex; gap:10px; flex-wrap:wrap; justify-content:center;">

            <a href="{{ asset($pdf ?: 'forms/Form-No.-NTC-1-01.pdf') }}" target="_blank" rel="noopener"
                style="background:#0d6efd;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                View PDF
            </a>
        </div>
    </div>
</div>
