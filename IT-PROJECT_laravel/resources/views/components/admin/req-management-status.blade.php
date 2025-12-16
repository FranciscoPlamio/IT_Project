@props(['req'])

@if ($req->form_type === 'form1-01' && $req->payment_status === 'paid')
    @if (!$req->form->or)
        <div class="status-badge progress">
            <img src="{{ asset('images/In-prog.png') }}">
            <span><a
                    href="{{ route('admin.declaration', ['highlight' => $req->payment_reference, 'section' => 'history']) }}">Pending
                    Official
                    Receipt</a></span>
        </div>
    @else
        <div class="status-badge done">
            <img src="{{ asset('images/Done.png') }}">
            <span>Official Receipt Completed</span>
        </div>
        @if ($req->form->admission_slip)
            <div class="status-badge done">
                <img src="{{ asset('images/Done.png') }}">
                <span>Admission Slip Completed</span>
            </div>
        @else
            <div class="status-badge progress">
                <img src="{{ asset('images/In-prog.png') }}">
                <span><a href="{{ route('admin.admission-slip', ['highlight' => $req->payment_reference]) }}">Pending
                        Admission Slip</a></span>
            </div>
        @endif
    @endif
@endif


@if (
    ($req->form_type === 'form1-02' && $req->payment_status === 'paid') ||
        ($req->form_type === 'form1-03' && $req->payment_status === 'paid'))
    @if (!$req->form->or)
        <div class="status-badge progress">
            <img src="{{ asset('images/In-prog.png') }}">
            <span><a
                    href="{{ route('admin.declaration', ['highlight' => $req->payment_reference, 'section' => 'history']) }}">Pending
                    Official
                    Receipt</a></span>
        </div>
    @else
        <div class="status-badge done">
            <img src="{{ asset('images/Done.png') }}">
            <span>Official Receipt Completed</span>
        </div>
        @php
            $certificateExists = false;

            try {
                // Check if a certificate record exists for this form token
                $certificateExists = \App\Models\Certificate::where('form_token', $req->form_token)->exists();
            } catch (\Exception $e) {
                $certificateExists = false;
            }

        @endphp
        @if ($certificateExists)
            <div class="status-badge done">
                <img src="{{ asset('images/Done.png') }}">
                <span>Certificate Completed</span>
            </div>
        @else
            <div class="status-badge progress">
                <img src="{{ asset('images/In-prog.png') }}">
                <span><a href="{{ route('admin.cert-request', ['highlight' => $req->payment_reference]) }}">Pending
                        Certificate</a></span>
            </div>
        @endif
    @endif
@endif


@if ($req->form_type === 'form1-09' && $req->payment_status === 'paid')
    @if (!$req->form->or)
        <div class="status-badge progress">
            <img src="{{ asset('images/In-prog.png') }}">
            <span>Pending Official Receiipt</span>
        </div>
    @else
        <div class="status-badge done">
            <img src="{{ asset('images/Done.png') }}">
            <span>Official Receipt Completed</span>
        </div>
        @php
            // Check if certificate has been generated (exists in attachments folder)
            $certificateExists = false;
            try {
                $files = Storage::disk('local')->files("forms/{$req->form_token}");
                foreach ($files as $file) {
                    if (Str::startsWith(basename($file), 'permit')) {
                        $certificateExists = true;
                        break;
                    }
                }
            } catch (\Exception $e) {
                $certificateExists = false;
            }
        @endphp
        @if ($certificateExists)
            <div class="status-badge done">
                <img src="{{ asset('images/Done.png') }}">
                <span>Permit Completed</span>
            </div>
        @else
            <div class="status-badge progress">
                <img src="{{ asset('images/In-prog.png') }}">
                <span>Pending Permit</span>
            </div>
        @endif
    @endif
@endif
