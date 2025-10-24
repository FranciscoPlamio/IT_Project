@php
    $examTypeLabels = [
        '1rtg_e1256_code25' => '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
        '1rtg_code25' => '1RTG - Code (25/20 wpm)',
        '2rtg_e1256_code16' => '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
        '2rtg_code16' => '2RTG - Code (16 wpm)',
        '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
        '3rtg_code16' => '3RTG - Code (16 wpm)',
        'class_a_e8910_code5' => 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
        'class_a_code5_only' => 'Class A - Code (5 wpm) Only',
        'class_b_e567' => 'Class B - Elements 5, 6 & 7',
        'class_b_e2' => 'Class B - Element 2',
        'class_c_e234' => 'Class C - Elements 2, 3 & 4',
        'class_d_e2' => 'Class D - Element 2',
        '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
        '2phn_e123' => '2PHN - Elements 1, 2 & 3',
        '3phn_e12' => '3PHN - Elements 1 & 2',
        'rroc_aircraft_e1' => 'RROC - Aircraft - Element 1'
    ];
    
    $needsLabels = ['0' => 'No', '1' => 'Yes'];
@endphp

<!-- Application Details Section -->
<div class="form-section">
    <div class="section-title">Application Details</div>
    
    <div class="form-field">
        <div class="field-label">Examination Type:</div>
        <div class="field-value">
            {{ $examTypeLabels[$form['exam_type']] ?? $form['exam_type'] ?? 'Not selected' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Date of Examination:</div>
        <div class="field-value">
            {{ $form['date_of_exam'] ? date('m/d/Y', strtotime($form['date_of_exam'])) : 'Not specified' }}
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
        <div class="field-value">{{ ucfirst($form['sex'] ?? 'Not provided') }}</div>
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

<!-- Request for Assistance Section -->
<div class="form-section">
    <div class="section-title">Request for Assistance</div>
    
    <div class="form-field">
        <div class="field-label">Special Needs/Requests:</div>
        <div class="field-value">{{ $needsLabels[$form['needs']] ?? 'Not specified' }}</div>
    </div>
    
    @if($form['needs'] === '1' && !empty($form['needs_details']))
        <div class="form-field">
            <div class="field-label">Specific Needs Details:</div>
            <div class="field-value">{{ $form['needs_details'] }}</div>
        </div>
    @endif
</div>

<!-- Examination Admission Slip Section -->
<div class="form-section">
    <div class="section-title">Examination Admission Slip</div>
    
    <div class="form-field">
        <div class="field-label">Admit Name:</div>
        <div class="field-value">{{ $form['admit_name'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Mailing Address:</div>
        <div class="field-value">{{ $form['mailing_address'] ?? 'Not provided' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Examination For:</div>
        <div class="field-value">{{ $form['exam_for'] ?? 'Not specified' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Place of Examination:</div>
        <div class="field-value">{{ $form['place_of_exam'] ?? 'Not specified' }}</div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Admission Date:</div>
        <div class="field-value">
            {{ $form['admission_date'] ? date('m/d/Y', strtotime($form['admission_date'])) : 'Not specified' }}
        </div>
    </div>
    
    <div class="form-field">
        <div class="field-label">Time of Examination:</div>
        <div class="field-value">{{ $form['time_of_exam'] ?? 'Not specified' }}</div>
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
