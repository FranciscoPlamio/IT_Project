@php
    $applicationTypeLabels = [
        'new' => 'NEW',
        'renewal' => 'RENEWAL',
        'modification' => 'MODIFICATION'
    ];
    
    $permitTypeLabels = [
        'amateur_operator' => 'Amateur Radio Operator Certificate',
        'amateur_station' => 'Amateur Radio Station License',
        'club_station' => 'Club Radio Station License',
        'temporary_foreign' => 'Temporary Permit for Foreign Visitor',
        'special_vanity' => 'Special Permit for Vanity/Special Call Sign'
    ];
    
    $stationClassLabels = [
        'class_a' => 'Class A',
        'class_b' => 'Class B',
        'class_c' => 'Class C',
        'class_d' => 'Class D'
    ];
    
    $sexLabels = [
        'male' => 'Male',
        'female' => 'Female'
    ];
@endphp

<!-- Application Details Section -->
<div class="form-section">
    <div class="section-title">Application Details</div>
    
    <div class="form-field">
        <div class="field-label">Application Type:</div>
        <div class="field-value">
            {{ $applicationTypeLabels[$form['application_type']] ?? $form['application_type'] ?? 'Not selected' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Permit Type:</div>
        <div class="field-value">
            {{ $permitTypeLabels[$form['permit_type']] ?? $form['permit_type'] ?? 'Not selected' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Station Class:</div>
        <div class="field-value">
            {{ $stationClassLabels[$form['station_class']] ?? $form['station_class'] ?? 'Not selected' }}
        </div>
    </div>
</div>

<!-- Applicant Details Section -->
<div class="form-section">
    <div class="section-title">Applicant's Details</div>
    
    <div class="form-field">
        <div class="field-label">Last Name:</div>
        <div class="field-value">{{ $form['last_name'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">First Name:</div>
        <div class="field-value">{{ $form['first_name'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Middle Name:</div>
        <div class="field-value">{{ $form['middle_name'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Date of Birth:</div>
        <div class="field-value">
        {{ !empty($form['date_of_birth']) ? date('m/d/Y', strtotime($form['date_of_birth'])) : 'Not provided' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Place of Birth:</div>
        <div class="field-value">{{ $form['place_of_birth'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Sex:</div>
        <div class="field-value">{{ $sexLabels[$form['sex']] ?? ucfirst($form['sex'] ?? 'Not provided') }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Civil Status:</div>
        <div class="field-value">{{ ucfirst($form['civil_status'] ?? 'Not provided') }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Nationality:</div>
        <div class="field-value">{{ $form['nationality'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Contact Number:</div>
        <div class="field-value">{{ $form['contact_number'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Email Address:</div>
        <div class="field-value">{{ $form['email_address'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Present Address:</div>
        <div class="field-value">{{ $form['present_address'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">City/Municipality:</div>
        <div class="field-value">{{ $form['city_municipality'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Province:</div>
        <div class="field-value">{{ $form['province'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">ZIP Code:</div>
        <div class="field-value">{{ $form['zip_code'] ?? 'Not provided' }}</div>
    </div>
</div>

<!-- Station Details Section -->
<div class="form-section">
    <div class="section-title">Station Details</div>
    
    <div class="form-field">
        <div class="field-label">Call Sign:</div>
        <div class="field-value">{{ $form['call_sign'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Station Location:</div>
        <div class="field-value">{{ $form['station_location'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Equipment Details:</div>
        <div class="field-value">{{ $form['equipment_details'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Frequency Range:</div>
        <div class="field-value">{{ $form['frequency_range'] ?? 'Not provided' }}</div>
    </div>
</div>

<!-- Official Receipt Section -->
<div class="form-section">
    <div class="section-title">Official Receipt Details</div>
    
    <div class="form-field">
        <div class="field-label">OR Number:</div>
        <div class="field-value">{{ $form['or_no'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">OR Date:</div>
        <div class="field-value">
            {{ $form['or_date'] ? date('m/d/Y', strtotime($form['or_date'])) : 'Not provided' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">OR Amount:</div>
        <div class="field-value">
            {{ $form['or_amount'] ? '₱' . number_format($form['or_amount'], 2) : 'Not provided' }}
        </div>
    </div>
</div>
