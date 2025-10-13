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
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Certificate Type:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '1RTG' ? '✓' : '' }}</div>
                <span>1RTG</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '2RTG' ? '✓' : '' }}</div>
                <span>2RTG</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '3RTG' ? '✓' : '' }}</div>
                <span>3RTG</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '1PHN' ? '✓' : '' }}</div>
                <span>1PHN</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '2PHN' ? '✓' : '' }}</div>
                <span>2PHN</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === '3PHN' ? '✓' : '' }}</div>
                <span>3PHN</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['certificate_type'] === 'others' ? '✓' : '' }}</div>
                <span>OTHERS, specify: {{ $form['others_specify'] ?? '' }}</span>
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

<!-- Employment Details Section -->
<div class="form-section">
    <div class="section-title">Employment Details</div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Employment Status:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['employment_status'] === 'employed' ? '✓' : '' }}</div>
                <span>Employed</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['employment_status'] === 'unemployed' ? '✓' : '' }}</div>
                <span>Unemployed</span>
            </div>
        </div>
    </div>
    
    @if($form['employment_status'] === 'employed')
        <div class="checkbox-section">
            <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Employment Type:</div>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <div class="checkbox-box">{{ $form['employment_type'] === 'local' ? '✓' : '' }}</div>
                    <span>Local</span>
                </div>
                <div class="checkbox-item">
                    <div class="checkbox-box">{{ $form['employment_type'] === 'foreign' ? '✓' : '' }}</div>
                    <span>Foreign</span>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label">Company/Organization:</div>
            <div class="form-value">{{ $form['company_organization'] ?? '' }}</div>
        </div>
        
        <div class="form-row">
            <div class="form-label">Position/Designation:</div>
            <div class="form-value">{{ $form['position_designation'] ?? '' }}</div>
        </div>
        
        <div class="form-row">
            <div class="form-label">Company Address:</div>
            <div class="form-value">{{ $form['company_address'] ?? '' }}</div>
        </div>
    @endif
</div>

<!-- Educational Background Section -->
<div class="form-section">
    <div class="section-title">Educational Background</div>
    
    <div class="form-row">
        <div class="form-label">School Attended:</div>
        <div class="form-value">{{ $form['school_attended'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Course Taken:</div>
        <div class="form-value">{{ $form['course_taken'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Year Graduated:</div>
        <div class="form-value">{{ $form['year_graduated'] ?? '' }}</div>
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
