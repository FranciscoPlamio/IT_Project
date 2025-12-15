<option value="">Select Course</option>

<option value="Commercial Pilot"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Commercial Pilot' ? 'selected' : '' }}>
    Commercial Pilot
</option>
<option value="Student Pilot"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Student Pilot' ? 'selected' : '' }}>
    Student Pilot
</option>
<option value="General Radio Communication Operator (GRCO)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'General Radio Communication Operator (GRCO)' ? 'selected' : '' }}>
    General Radio Communication Operator (GRCO)
</option>
<option value="Industrial Electronics Technician Course (IETC)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Industrial Electronics Technician Course (IETC)' ? 'selected' : '' }}>
    Industrial Electronics Technician Course (IETC)
</option>
<option value="Communications Technician Course (CTC)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Communications Technician Course (CTC)' ? 'selected' : '' }}>
    Communications Technician Course (CTC)
</option>
<option value="Bachelor of Science in Avionics Technology (BS AVTECH)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Bachelor of Science in Avionics Technology (BS AVTECH)' ? 'selected' : '' }}>
    Bachelor of Science in Avionics Technology (BS AVTECH)
</option>
<option
    value="Bachelor of Science in Electronics and Communications Engineering / Bachelor of Science in Electronics Engineering (BS ECE)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Bachelor of Science in Electronics and Communications Engineering / Bachelor of Science in Electronics Engineering (BS ECE)' ? 'selected' : '' }}>
    Bachelor of Science in Electronics and Communications Engineering /
    Electronics Engineering (BS ECE)
</option>
<option value="Radio Enthusiast"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Radio Enthusiast' ? 'selected' : '' }}>
    Radio Enthusiast
</option>
<option value="Registered ECE or Commercial Operator"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Registered ECE or Commercial Operator' ? 'selected' : '' }}>
    Registered ECE or Commercial Operator
</option>
<option value="Licensed Amateur (for upgrading)"
    {{ old('course_taken', $form['course_taken'] ?? '') == 'Licensed Amateur (for upgrading)' ? 'selected' : '' }}>
    Licensed Amateur (for upgrading)
</option>
<option value="Other" {{ old('course_taken', $form['course_taken'] ?? '') == 'Other' ? 'selected' : '' }}>
    Other
</option>
