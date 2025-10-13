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
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Application Type:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['application_type'] === 'new' ? '✓' : '' }}</div>
                <span>NEW</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['application_type'] === 'renewal' ? '✓' : '' }}</div>
                <span>RENEWAL</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['application_type'] === 'modification' ? '✓' : '' }}</div>
                <span>MODIFICATION</span>
            </div>
        </div>
    </div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Permit Type:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['permit_type'] === 'amateur_operator' ? '✓' : '' }}</div>
                <span>Amateur Radio Operator Certificate</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['permit_type'] === 'amateur_station' ? '✓' : '' }}</div>
                <span>Amateur Radio Station License</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['permit_type'] === 'club_station' ? '✓' : '' }}</div>
                <span>Club Radio Station License</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['permit_type'] === 'temporary_foreign' ? '✓' : '' }}</div>
                <span>Temporary Permit for Foreign Visitor</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['permit_type'] === 'special_vanity' ? '✓' : '' }}</div>
                <span>Special Permit for Vanity/Special Call Sign</span>
            </div>
        </div>
    </div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Station Class:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['station_class'] === 'class_a' ? '✓' : '' }}</div>
                <span>Class A</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['station_class'] === 'class_b' ? '✓' : '' }}</div>
                <span>Class B</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['station_class'] === 'class_c' ? '✓' : '' }}</div>
                <span>Class C</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['station_class'] === 'class_d' ? '✓' : '' }}</div>
                <span>Class D</span>
            </div>
        </div>
    </div>
</div>

<!-- Applicant Details Section -->
<div class="form-section">
    <div class="section-title">Applicant's Details</div>
    
    <div class="form-row">
        <div class="form-label">Last Name:</div>
        <div class="form-value">{{ $form['last_name'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">First Name:</div>
        <div class="form-value">{{ $form['first_name'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Middle Name:</div>
        <div class="form-value">{{ $form['middle_name'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Date of Birth:</div>
        <div class="form-value">{{ !empty($form['date_of_birth']) ? date('m/d/Y', strtotime($form['date_of_birth'])) : '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Place of Birth:</div>
        <div class="form-value">{{ $form['place_of_birth'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Sex:</div>
        <div class="form-value">{{ $sexLabels[$form['sex']] ?? ucfirst($form['sex'] ?? '') }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Civil Status:</div>
        <div class="form-value">{{ ucfirst($form['civil_status'] ?? '') }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Nationality:</div>
        <div class="form-value">{{ $form['nationality'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Contact Number:</div>
        <div class="form-value">{{ $form['contact_number'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Email Address:</div>
        <div class="form-value">{{ $form['email_address'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Present Address:</div>
        <div class="form-value">{{ $form['present_address'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">City/Municipality:</div>
        <div class="form-value">{{ $form['city_municipality'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Province:</div>
        <div class="form-value">{{ $form['province'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">ZIP Code:</div>
        <div class="form-value">{{ $form['zip_code'] ?? '' }}</div>
    </div>
</div>

<!-- Station Details Section -->
<div class="form-section">
    <div class="section-title">Station Details</div>
    
    <div class="form-row">
        <div class="form-label">Call Sign:</div>
        <div class="form-value">{{ $form['call_sign'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Station Location:</div>
        <div class="form-value">{{ $form['station_location'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Equipment Details:</div>
        <div class="form-value">{{ $form['equipment_details'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Frequency Range:</div>
        <div class="form-value">{{ $form['frequency_range'] ?? '' }}</div>
    </div>
</div>

<!-- Official Receipt Section -->
<div class="or-section">
    <div class="or-label"><strong>OR No.:</strong></div>
    <div class="or-input">{{ $form['or_no'] ?? '' }}</div>
    
    <div class="or-label"><strong>Date:</strong></div>
    <div class="or-input">{{ !empty($form['or_date']) ? date('m/d/Y', strtotime($form['or_date'])) : '' }}</div>
    
    <div class="or-label"><strong>Amount:</strong></div>
    <div class="or-input">{{ isset($form['or_amount']) && $form['or_amount'] !== '' ? '₱' . number_format($form['or_amount'], 2) : '' }}</div>
    
    <div class="or-label"><strong>Collecting Officer</strong></div>
</div>
