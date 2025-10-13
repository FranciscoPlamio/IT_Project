@php
    $applicationTypeLabels = [
        'new' => 'NEW',
        'renewal' => 'RENEWAL',
        'modification' => 'MODIFICATION'
    ];
    
    $certificateTypeLabels = [
        '1RTG' => '1RTG',
        '2RTG' => '2RTG',
        '3RTG' => '3RTG',
        '1PHN' => '1PHN',
        '2PHN' => '2PHN',
        '3PHN' => '3PHN',
        'SROP' => 'SROP',
        'RROC-Land Mobile' => 'RROC-Land Mobile (RLM)',
        'RROC-Aircraft' => 'RROC-Aircraft',
        'GROC' => 'GROC (Government)',
        'TP RROC-Aircraft' => 'TP RROC-Aircraft (Foreign Pilot)',
        'others' => 'OTHERS, specify'
    ];
    
    $sexLabels = [
        'male' => 'Male',
        'female' => 'Female'
    ];
    
    $employmentStatusLabels = [
        'employed' => 'Employed',
        'unemployed' => 'Unemployed'
    ];
    
    $employmentTypeLabels = [
        'local' => 'Local',
        'foreign' => 'Foreign'
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
        <div class="field-label">Certificate Type:</div>
        <div class="field-value">
            {{ $certificateTypeLabels[$form['certificate_type']] ?? $form['certificate_type'] ?? 'Not selected' }}
        </div>
    </div>
    
    @if($form['certificate_type'] === 'others' && !empty($form['others_specify']))
        <div class="form-field">
            <div class="field-label">Others (Specify):</div>
            <div class="field-value">{{ $form['others_specify'] }}</div>
        </div>
    @endif
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

<!-- Employment Details Section -->
<div class="form-section">
    <div class="section-title">Employment Details</div>
    
    <div class="form-field">
        <div class="field-label">Employment Status:</div>
        <div class="field-value">{{ $employmentStatusLabels[$form['employment_status']] ?? ucfirst($form['employment_status'] ?? 'Not provided') }}</div>
    </div>
    
    @if($form['employment_status'] === 'employed')
        <div class="form-field">
            <div class="field-label">Employment Type:</div>
            <div class="field-value">{{ $employmentTypeLabels[$form['employment_type']] ?? ucfirst($form['employment_type'] ?? 'Not provided') }}</div>
        </div>
        
        <div class="form-field">
            <div class="field-label">Company/Organization:</div>
            <div class="field-value">{{ $form['company_organization'] ?? 'Not provided' }}</div>
        </div>
        
        <div class="form-field">
            <div class="field-label">Position/Designation:</div>
            <div class="field-value">{{ $form['position_designation'] ?? 'Not provided' }}</div>
        </div>
        
        <div class="form-field">
            <div class="field-label">Company Address:</div>
            <div class="field-value">{{ $form['company_address'] ?? 'Not provided' }}</div>
        </div>
    @endif
</div>

<!-- Educational Background Section -->
<div class="form-section">
    <div class="section-title">Educational Background</div>
    
    <div class="form-field">
        <div class="field-label">School Attended:</div>
        <div class="field-value">{{ $form['school_attended'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Course Taken:</div>
        <div class="field-value">{{ $form['course_taken'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Year Graduated:</div>
        <div class="field-value">{{ $form['year_graduated'] ?? 'Not provided' }}</div>
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
            {{ !empty($form['or_date']) ? date('m/d/Y', strtotime($form['or_date'])) : 'Not provided' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">OR Amount:</div>
        <div class="field-value">
            {{ isset($form['or_amount']) && $form['or_amount'] !== '' ? '₱' . number_format($form['or_amount'], 2) : 'Not provided' }}
        </div>
    </div>
</div>
