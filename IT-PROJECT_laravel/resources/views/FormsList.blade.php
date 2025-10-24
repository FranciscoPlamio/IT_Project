<x-layout :title="'List of Harmonized Forms'">

    <main>
        <div class="forms-list-container">
            @if (session('success'))
                <div
                    style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div
                    style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            @endif

            <div style="display:flex;justify-content:space-between;align-items:center;">
                <div>
                    <div class="forms-list-header">LIST OF HARMONIZED FORMS</div>
                </div>
                <div style="display:flex;align-items:center;gap:15px;">
                    @if (session('email_verified'))
                        <div style="font-size:14px;color:#666;">
                            Verified as: <strong>{{ session('email_verified') }}</strong>
                        </div>
                        <form method="POST" action="{{ route('email-auth.clear') }}" style="display:inline;">
                            @csrf
                            <button type="submit"
                                style="background:#dc3545;color:white;border:none;padding:6px 12px;border-radius:4px;cursor:pointer;font-size:12px;">
                                Sign Out
                            </button>
                        </form>
                    @endif
                    <form class="forms-search-bar" onsubmit="return false;">
                        <input class="forms-search-input" type="text" placeholder="Search" />
                        <span class="forms-search-icon">&#128269;</span>
                    </form>
                </div>
            </div>
            <div class="forms-list-wrapper">
                <table class="forms-list-table">
                    <thead>
                        <tr>
                            <th>Form No.</th>
                            <th>Form Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms as $form)
                            <tr>
                                <td>Form No. NTC {{ $form['number'] }}</td>
                                <td>{{ $form['title'] }}</td>
                                <td>
                                    <a class="forms-signup-btn"
                                        href="{{ route('forms.show', ['formType' => $form['number']]) }}">
                                        Sign up</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-layout>
