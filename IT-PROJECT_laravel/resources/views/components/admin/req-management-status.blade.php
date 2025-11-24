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
        <div class="status-badge progress">
            <img src="{{ asset('images/In-prog.png') }}">
            <span>Pending Admission Slip</span>
        </div>
    @endif
@endif
