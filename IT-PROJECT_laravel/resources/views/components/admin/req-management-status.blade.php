@props(['req'])

@if ($req->form_type === 'form1-01' && $req->payment_status === 'paid')
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
        @if ($req->form->admission_slip)
            <div class="status-badge done">
                <img src="{{ asset('images/Done.png') }}">
                <span>Admission Slip Completed</span>
            </div>
        @else
            <div class="status-badge progress">
                <img src="{{ asset('images/In-prog.png') }}">
                <span>Pending Admission Slip</span>
            </div>
        @endif
    @endif
@endif
@if ($req->form_type === 'form1-02' && $req->payment_status === 'paid')
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
                    if (str_contains($file, 'certificate_')) {
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
                <span>Certificate Completed</span>
            </div>
        @else
            <div class="status-badge progress">
                <img src="{{ asset('images/In-prog.png') }}">
                <span>Pending Certificate</span>
            </div>
        @endif
    @endif
@endif
