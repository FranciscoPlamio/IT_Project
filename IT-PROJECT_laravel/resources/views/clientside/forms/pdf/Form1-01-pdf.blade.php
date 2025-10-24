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
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Radiotelegraphy:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '1rtg_e1256_code25' ? '✓' : '' }}</div>
                <span>1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '1rtg_code25' ? '✓' : '' }}</div>
                <span>1RTG - Code (25/20 wpm)</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '2rtg_e1256_code16' ? '✓' : '' }}</div>
                <span>2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '2rtg_code16' ? '✓' : '' }}</div>
                <span>2RTG - Code (16 wpm)</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '3rtg_e125_code16' ? '✓' : '' }}</div>
                <span>3RTG - Elements 1, 2, 5 & Code (16 wpm)</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '3rtg_code16' ? '✓' : '' }}</div>
                <span>3RTG - Code (16 wpm)</span>
            </div>
        </div>
    </div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Amateur:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_a_e8910_code5' ? '✓' : '' }}</div>
                <span>Class A - Elements 8, 9, 10 & Code (5 wpm)</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_a_code5_only' ? '✓' : '' }}</div>
                <span>Class A - Code (5 wpm) Only</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_b_e567' ? '✓' : '' }}</div>
                <span>Class B - Elements 5, 6 & 7</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_b_e2' ? '✓' : '' }}</div>
                <span>Class B - Element 2</span>
            </div>
        </div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_c_e234' ? '✓' : '' }}</div>
                <span>Class C - Elements 2, 3 & 4</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'class_d_e2' ? '✓' : '' }}</div>
                <span>Class D - Element 2</span>
            </div>
        </div>
    </div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Radiotelephony:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '1phn_e1234' ? '✓' : '' }}</div>
                <span>1PHN - Elements 1, 2, 3 & 4</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '2phn_e123' ? '✓' : '' }}</div>
                <span>2PHN - Elements 1, 2 & 3</span>
            </div>
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === '3phn_e12' ? '✓' : '' }}</div>
                <span>3PHN - Elements 1 & 2</span>
            </div>
        </div>
    </div>
    
    <div class="checkbox-section">
        <div style="font-size: 11px; font-weight: bold; margin-bottom: 6px;">Restricted Radiotelephone:</div>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <div class="checkbox-box">{{ $form['exam_type'] === 'rroc_aircraft_e1' ? '✓' : '' }}</div>
                <span>RROC - Aircraft - Element 1</span>
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-label">DATE OF EXAM (mm/dd/yy):</div>
        <div class="form-value">{{ $form['date_of_exam'] ? date('m/d/Y', strtotime($form['date_of_exam'])) : '' }}</div>
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
        <div class="form-value">{{ ucfirst($form['sex'] ?? '') }}</div>
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

<!-- Request for Assistance Section -->
<div class="form-section">
    <div class="section-title">Request for Assistance</div>
    
    <div class="checkbox-group" style="margin-bottom: 8px;">
        <div class="checkbox-item">
            <div class="checkbox-box">{{ $form['needs'] === '1' ? '✓' : '' }}</div>
            <span>Yes</span>
        </div>
        <div class="checkbox-item">
            <div class="checkbox-box">{{ $form['needs'] === '0' ? '✓' : '' }}</div>
            <span>No</span>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Do you have any special needs and/or requests during the examination?</div>
        <div class="form-value">{{ $form['needs_details'] ?? '' }}</div>
    </div>
</div>

<!-- Examination Admission Slip Section -->
<div class="admission-slip">
    <div class="admission-title">EXAMINATION ADMISSION SLIP</div>
    
    <div class="admission-text">
        TO: THE CHAIRPERSON, Radio Operators Examination Committee
    </div>
    
    <div class="admission-text">
        Please admit Mr. / Ms. <span class="admission-field">{{ $form['admit_name'] ?? '' }}</span>, with mailing address at <span class="admission-field">{{ $form['mailing_address'] ?? '' }}</span>
    </div>
    
    <div class="admission-text">
        in the examination for <span class="admission-field">{{ $form['exam_for'] ?? '' }}</span>
    </div>
    
    <div class="form-row">
        <div class="form-label">Place of Exam:</div>
        <div class="form-value">{{ $form['place_of_exam'] ?? '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Date of Exam (mm/dd/yy):</div>
        <div class="form-value">{{ $form['admission_date'] ? date('m/d/Y', strtotime($form['admission_date'])) : '' }}</div>
    </div>
    
    <div class="form-row">
        <div class="form-label">Time of Exam:</div>
        <div class="form-value">{{ $form['time_of_exam'] ?? '' }}</div>
    </div>
    
    <div style="margin-top: 15px;">
        <div style="font-size: 10px; margin-bottom: 8px;"><strong>INSTRUCTIONS TO THE EXAMINEE:</strong></div>
        <div style="font-size: 9px; margin-left: 15px; line-height: 1.3;">
            1. Examinees shall present this Admission Slip and any valid government issued ID with picture or School ID, for students. (No Admission Slip and ID, No Exam.)<br>
            2. Examinees who are late for more than 30 minutes shall not be allowed to take the examination.<br>
            3. Request for re-schedule of examination must be filed at least 1 week before the date of examination.<br>
            4. In case of suspension / cancellation of work in government offices due to force majeure, the scheduled regular examination shall be conducted on the next regular working day.
        </div>
    </div>
</div>

<!-- Official Receipt Section -->
<div class="or-section">
    <div class="or-label"><strong>OR No.:</strong></div>
    <div class="or-input">{{ $form['or_no'] ?? '' }}</div>
    
    <div class="or-label"><strong>Date:</strong></div>
    <div class="or-input">{{ $form['or_date'] ? date('m/d/Y', strtotime($form['or_date'])) : '' }}</div>
    
    <div class="or-label"><strong>Amount:</strong></div>
    <div class="or-input">{{ $form['or_amount'] ? '₱' . number_format($form['or_amount'], 2) : '' }}</div>
    
    <div class="or-label"><strong>Collecting Officer</strong></div>
</div>
