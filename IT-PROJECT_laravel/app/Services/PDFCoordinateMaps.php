<?php

namespace App\Services;

class PDFCoordinateMaps
{
    /**
     * A4 page dimensions in points (72 points = 1 inch)
     * A4 = 210mm × 297mm = 8.27" × 11.69" = 595.28 × 841.89 points
     */
    const A4_WIDTH = 595.28;
    const A4_HEIGHT = 841.89;

    /**
     * Get A4 page size information
     */
    public static function getA4PageSize()
    {
        return [
            'width' => self::A4_WIDTH,
            'height' => self::A4_HEIGHT,
            'width_inches' => 8.27,
            'height_inches' => 11.69,
            'orientation' => 'portrait'
        ];
    }

    /**
     * Get all coordinate maps for PDF forms
     */
    public static function getAllMaps()
    {
        return [
            '1-01' => self::getForm101Coordinates(),
            '1-02' => self::getForm102Coordinates(),
            '1-03' => self::getForm103Coordinates(),
            '1-09' => self::getForm109Coordinates(),
            '1-11' => self::getForm111Coordinates(),
            '1-13' => self::getForm113Coordinates(),
            '1-14' => self::getForm114Coordinates(),
            '1-16' => self::getForm116Coordinates(),
            '1-18' => self::getForm118Coordinates(),
            '1-19' => self::getForm119Coordinates(),
            '1-20' => self::getForm120Coordinates(),
            '1-21' => self::getForm121Coordinates(),
            '1-22' => self::getForm122Coordinates(),
            '1-24' => self::getForm124Coordinates(),
            '1-25' => self::getForm125Coordinates(),
            '1-26' => self::getForm126Coordinates(),
        ];
    }

    /**
     * Get coordinates for Form 1-01 (Application for Radio Operator Examination)
     */
    private static function getForm101Coordinates()
    {
        return [
            // Personal Information Section
            'first_name' => [34.00, 117.85],
            'middle_name' => [34.00, 121.95],
            'last_name' => [34.00, 113.55],
            'suffix' => [83.60, 95],
            'dob' => [163.60, 113.55],
            'place_of_birth' => [83.60, 110],
            'nationality' => [146.60, 121.95],
            'sex' => [146.60, 117.85], // default/male position
            'sex_positions' => [
                'male' => [146.60, 117.85],
                // TODO: Adjust this placeholder to match female checkbox exact location on the template
                'female' => [151.60, 117.85],
            ],
            'civil_status' => [83.60, 125],
            'religion' => [83.60, 125],
            'height' => [83.60, 125],
            'weight' => [83.60, 125],

            // Address Information
            'unit' => [51.50, 126.30],
            'street' => [146.60, 126.05],
            'barangay' => [51.50, 130.30],
            'city' => [146.60, 130.55],
            'province' => [51.50, 134.50],
            'zip_code' => [146.60, 134.55],

            // Contact Information
            'contact_number' => [51.50, 139.00],
            'email' => [146.60, 138.75],

            // Education Information
            'school_attended' => [43, 143.00],
            'course_taken' => [43, 147.20],
            'year_graduated' => [146.60, 147.20],

            // Special Needs
            'needs' => [146.60, 153.20], // default position
            'needs_positions' => [
                // Placeholders; adjust to exact YES/NO checkbox coordinates
                'yes' => [112.60, 155.50], // YES: 112.60, 155.50
                'no' => [129.60, 155.50], // NO: 129.60, 155.50
            ],
            'needs_details' => [85.60, 159.60],

            // Exam Type Selection placeholders: position per option (mark 'X' at these coords)
            // Update these coordinates to match the exact checkbox locations on the template
            'exam_type' => [17, 65.70], // fallback position if specific option not mapped
            'exam_type_positions' => [
                // Radiotelegraphy
                '1rtg_e1256_code25' => [17, 65.70],
                '1rtg_code25' => [16, 67.70],
                '2rtg_e1256_code16' => [16, 69.70],
                '2rtg_code16' => [16, 71.70],
                '3rtg_e125_code16' => [16, 73.70],
                '3rtg_code16' => [16, 75.70],

                // Amateur
                'class_a_e8910_code5' => [60, 65.70],
                'class_a_code5_only' => [60, 67.70],
                'class_b_e567' => [60, 69.70],
                'class_b_e2' => [60, 71.70],
                'class_c_e234' => [60, 73.70],
                'class_d_e2' => [60, 75.70],

                // Radiotelephony
                '1phn_e1234' => [105, 65.70],
                '2phn_e123' => [105, 67.70],
                '3phn_e12' => [105, 69.70],

                // Restricted Radiotelephone
                'rroc_aircraft_e1' => [150, 65.70],
            ],
        ];
    }

    /**
     * Get coordinates for Form 1-02
     */
    private static function getForm102Coordinates()
    {
        return [
            // Applicant name fields
            'last_name' => [30.30, 147.70],
            'first_name' => [30.30, 152.90],
            'middle_name' => [30.30, 157.30], // placeholder

            // Personal info
            'dob' => [50, 160],
            'sex' => [30.30, 163.50],
            'sex_positions' => [
                'male' => [30.30, 163.50],
                'female' => [35.30, 163.50], // placeholder
            ],
            'nationality' => [30.30, 168.90],

            // Address fields
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [135.50, 190.00],

            // Application type fields
            'application_type' => [50, 170], // placeholder
            'modification_reason' => [50, 175], // placeholder
            'years' => [50, 180], // placeholder

            // Physical info
            'height' => [50, 185], // placeholder
            'weight' => [50, 190], // placeholder
            'employment_status' => [50, 195], // placeholder
            'employment_type' => [50, 200], // placeholder

            // Certificate info
            'certificate_type' => [50, 205], // placeholder

            // Exam fields
            'exam_place' => [50, 210], // placeholder
            'exam_date' => [50, 215], // placeholder
            'rating' => [50, 220], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-03
     */
    private static function getForm103Coordinates()
    {
        return [
            // Applicant name fields
            'last_name' => [50, 100],
            'first_name' => [50, 105],
            'middle_name' => [50, 110], // placeholder

            // Personal info
            'dob' => [50, 160],
            'sex' => [150, 180],
            'sex_positions' => [
                'male' => [150, 180],
                'female' => [155, 180], // placeholder
            ],
            'nationality' => [50, 180],

            // Address fields
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Application type fields
            'application_type' => [50, 200], // placeholder
            'modification_reason' => [50, 205], // placeholder
            'years' => [50, 210], // placeholder

            // Exam fields
            'exam_place' => [50, 215], // placeholder
            'exam_date' => [50, 220], // placeholder
            'rating' => [50, 225], // placeholder

            // License info
            'atroc_arsl_no' => [50, 230], // placeholder
            'call_sign' => [50, 235], // placeholder
            'validity' => [50, 240], // placeholder
            'station_class' => [50, 245], // placeholder
            'permit_type' => [50, 250], // placeholder
            'club_name' => [50, 255], // placeholder
            'assigned_frequency' => [50, 260], // placeholder
            'preferred_call_sign' => [50, 265], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-09
     */
    private static function getForm109Coordinates()
    {
        return [
            // Address fields
            'unit' => [50, 100], // placeholder
            'street' => [50, 105], // placeholder
            'barangay' => [50, 110], // placeholder
            'city' => [50, 115], // placeholder
            'province' => [50, 120], // placeholder
            'zip_code' => [50, 125], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Applicant details
            'applicant' => [50, 140], // placeholder
            'validity' => [50, 160], // placeholder
            'cpc_cpcn_pa_rsl_no' => [50, 180], // placeholder

            // Application details
            'application_type' => [50, 200], // placeholder
            'radio_service' => [50, 205], // placeholder
            'others_specify' => [50, 210], // placeholder
            'nature_service' => [50, 215], // placeholder
            'rt_units' => [50, 220], // placeholder
            'fx_units' => [50, 225], // placeholder
            'fb_units' => [50, 230], // placeholder
            'ml_units' => [50, 235], // placeholder
            'p_units' => [50, 240], // placeholder
            'bc_units' => [50, 245], // placeholder
            'fc_units' => [50, 250], // placeholder
            'fa_units' => [50, 255], // placeholder
            'ma_units' => [50, 260], // placeholder
            'tc_units' => [50, 265], // placeholder
            'others_station_specify' => [50, 270], // placeholder
            'others_station_units' => [50, 275], // placeholder

            // Station Equipment
            'exact_location' => [50, 280], // placeholder
            'longitude' => [50, 285], // placeholder
            'latitude' => [50, 290], // placeholder
            'points_of_comm' => [50, 295], // placeholder
            'frequency' => [50, 300], // placeholder
            'make_type_model' => [50, 305], // placeholder
            'serial_number' => [50, 310], // placeholder
            'bandwidth_emission' => [50, 315], // placeholder
            'power_output' => [50, 320], // placeholder
            'frequency_range' => [50, 325], // placeholder

            // Source of Equipment
            'dealer_name' => [50, 330], // placeholder
            'authorized_seller_buyer' => [50, 335], // placeholder
            'or_invoice_no' => [50, 340], // placeholder
            'permit_rsl_no' => [50, 345], // placeholder

            // Intended Use
            'intended_use' => [50, 350], // placeholder
            'others_use_specify' => [50, 355], // placeholder
            'storage_location' => [50, 360], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-11
     */
    private static function getForm111Coordinates()
    {
        return [
            // Application Details
            'application_type' => [50, 100], // placeholder
            'modification_reason' => [50, 105], // placeholder
            'permit_type' => [50, 110], // placeholder
            'years' => [50, 115], // placeholder
            'radio_service' => [50, 120], // placeholder
            'others_specify' => [50, 125], // placeholder

            // Applicant details
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            'applicant' => [50, 170], // placeholder
            'validity' => [50, 180], // placeholder

            // Station Units
            'rt_units' => [50, 200], // placeholder
            'fx_units' => [50, 205], // placeholder
            'fb_units' => [50, 210], // placeholder
            'ml_units' => [50, 215], // placeholder
            'p_units' => [50, 220], // placeholder
            'bc_units' => [50, 225], // placeholder
            'fc_units' => [50, 230], // placeholder
            'fa_units' => [50, 235], // placeholder
            'ma_units' => [50, 240], // placeholder
            'tc_units' => [50, 245], // placeholder
            'others_station_specify' => [50, 250], // placeholder
            'others_station_units' => [50, 255], // placeholder

            // Station Equipment
            'exact_location' => [50, 260], // placeholder
            'longitude' => [50, 265], // placeholder
            'latitude' => [50, 270], // placeholder
            'points_of_comm' => [50, 275], // placeholder
            'assigned_freq' => [50, 280], // placeholder
            'bandwidth_emission' => [50, 285], // placeholder
            'configuration' => [50, 290], // placeholder
            'data_rate' => [50, 295], // placeholder
            'call_sign' => [50, 300], // placeholder
            'rsl_no' => [50, 305], // placeholder

            'make_type_model' => [50, 310], // placeholder
            'serial_number' => [50, 315], // placeholder

            'power_output' => [50, 320], // placeholder
            'frequency_range' => [50, 325], // placeholder
            'others_station' => [50, 330], // placeholder
            'antenna_type' => [50, 335], // placeholder
            'antenna_height' => [50, 340], // placeholder
            'antenna_gain' => [50, 345], // placeholder
            'antenna_directivity' => [50, 350], // placeholder
            'antenna_polarization' => [50, 355], // placeholder
            'antenna_beamwidth' => [50, 360], // placeholder
            'antenna_diameter' => [50, 365], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-13
     */
    private static function getForm113Coordinates()
    {
        return [
            // Applicant
            'applicant' => [50, 100], // placeholder

            // Particulars - Authorized vs Proposed
            'authorized_exact_location' => [50, 120], // placeholder
            'proposed_exact_location' => [50, 125], // placeholder
            'authorized_longitude' => [50, 130], // placeholder
            'proposed_longitude' => [50, 135], // placeholder
            'authorized_latitude' => [50, 140], // placeholder
            'proposed_latitude' => [50, 145], // placeholder
            'authorized_points_of_comm' => [50, 150], // placeholder
            'proposed_points_of_comm' => [50, 155], // placeholder
            'authorized_assigned_freq' => [50, 160], // placeholder
            'proposed_assigned_freq' => [50, 165], // placeholder
            'authorized_bw_emission' => [50, 170], // placeholder
            'proposed_bw_emission' => [50, 175], // placeholder
            'authorized_configuration' => [50, 180], // placeholder
            'proposed_configuration' => [50, 185], // placeholder
            'authorized_data_rate' => [50, 190], // placeholder
            'proposed_data_rate' => [50, 195], // placeholder
            'authorized_make_type_model' => [50, 200], // placeholder
            'proposed_make_type_model' => [50, 205], // placeholder
            'authorized_serial_no' => [50, 210], // placeholder
            'proposed_serial_no' => [50, 215], // placeholder
            'authorized_power_output' => [50, 220], // placeholder
            'proposed_power_output' => [50, 225], // placeholder
            'authorized_freq_range' => [50, 230], // placeholder
            'proposed_freq_range' => [50, 235], // placeholder
            'authorized_others_1' => [50, 240], // placeholder
            'proposed_others_1' => [50, 245], // placeholder
            'authorized_others_2' => [50, 250], // placeholder
            'proposed_others_2' => [50, 255], // placeholder
            'authorized_others_3' => [50, 260], // placeholder
            'proposed_others_3' => [50, 265], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-14
     */
    private static function getForm114Coordinates()
    {
        return [
            // Transport Details
            'place_of_origin' => [50, 100], // placeholder
            'purpose' => [50, 105], // placeholder
            'destination' => [50, 110], // placeholder

            // Application Information
            'applicant' => [50, 120], // placeholder
            'validity' => [50, 125], // placeholder
            'permit_rsl_no' => [50, 130], // placeholder
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Proposed Equipment
            'equipment1_make' => [50, 200], // placeholder
            'equipment1_serial' => [50, 205], // placeholder
            'equipment2_make' => [50, 210], // placeholder
            'equipment2_serial' => [50, 215], // placeholder
            'equipment3_make' => [50, 220], // placeholder
            'equipment3_serial' => [50, 225], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-16
     */
    private static function getForm116Coordinates()
    {
        return [
            // Transport Details
            'place_of_origin' => [50, 100], // placeholder
            'purpose' => [50, 105], // placeholder
            'destination' => [50, 110], // placeholder

            // Application Information
            'applicant' => [50, 120], // placeholder
            'validity' => [50, 125], // placeholder
            'permit_rsl_no' => [50, 130], // placeholder
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Proposed Equipment
            'equipment1_make' => [50, 200], // placeholder
            'equipment1_serial' => [50, 205], // placeholder
            'equipment2_make' => [50, 210], // placeholder
            'equipment2_serial' => [50, 215], // placeholder
            'equipment3_make' => [50, 220], // placeholder
            'equipment3_serial' => [50, 225], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-18
     */
    private static function getForm118Coordinates()
    {
        return [
            // Application Details
            'application_type' => [50, 100], // placeholder
            'modification_reason' => [50, 105], // placeholder
            'application_category' => [50, 110], // placeholder

            // Applicant Details
            'applicant' => [50, 120], // placeholder
            'permit_no' => [50, 125], // placeholder
            'validity' => [50, 130], // placeholder
            'entity_type' => [50, 135], // placeholder
            'others_entity' => [50, 140], // placeholder

            // Address fields
            'unit' => [50, 150], // placeholder
            'street' => [50, 155], // placeholder
            'barangay' => [50, 160], // placeholder
            'city' => [50, 165], // placeholder
            'province' => [50, 170], // placeholder
            'zip_code' => [50, 175], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Personnel Required
            'supervising_engineer_name' => [50, 200], // placeholder
            'supervising_engineer_pece' => [50, 205], // placeholder
            'supervising_engineer_validity' => [50, 210], // placeholder
            'technician_name' => [50, 215], // placeholder
            'technician_certificate' => [50, 220], // placeholder
            'technician_validity' => [50, 225], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-19
     */
    private static function getForm119Coordinates()
    {
        return [
            // Type of Equipment
            'equipment_type' => [50, 100], // placeholder

            // Applicant Details
            'applicant' => [50, 120], // placeholder
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],
            'validity' => [50, 180], // placeholder
            'permit_import_no' => [50, 185], // placeholder
            'invoice_no' => [50, 190], // placeholder
            'cpcn_pa_rsl_no' => [50, 195], // placeholder

            // Equipment and Devices
            'equipment1_make' => [50, 200], // placeholder
            'equipment1_quantity' => [50, 205], // placeholder
            'equipment1_serial' => [50, 210], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-20
     */
    private static function getForm120Coordinates()
    {
        return [
            // Application Details
            'application_type' => [50, 100], // placeholder
            'modification_reason' => [50, 105], // placeholder
            'service_category' => [50, 110], // placeholder

            // Applicant Details
            'applicant' => [50, 120], // placeholder
            'unit' => [50, 140], // placeholder
            'street' => [50, 145], // placeholder
            'barangay' => [50, 150], // placeholder
            'city' => [50, 155], // placeholder
            'province' => [50, 160], // placeholder
            'zip_code' => [50, 165], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],
            'cpcn_pa_ca_no' => [50, 180], // placeholder
            'cpcn_validity' => [50, 185], // placeholder
            'cor_no' => [50, 190], // placeholder
            'cor_validity' => [50, 195], // placeholder
            'known_by_another_name' => [50, 200], // placeholder
            'former_name' => [50, 205], // placeholder

            // Value Added Service
            'vas_services' => [50, 220], // placeholder
            'others_vas' => [50, 225], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-21
     */
    private static function getForm121Coordinates()
    {
        return [
            // Applicant Details
            'applicant' => [50, 100], // placeholder
            'unit' => [50, 120], // placeholder
            'street' => [50, 125], // placeholder
            'barangay' => [50, 130], // placeholder
            'city' => [50, 135], // placeholder
            'province' => [50, 140], // placeholder
            'zip_code' => [50, 145], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],

            // Permit License Details
            'permit_license_certificate_no' => [50, 180], // placeholder
            'validity' => [50, 185], // placeholder

            // Circumstances
            'circumstances' => [50, 200], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-22
     */
    private static function getForm122Coordinates()
    {
        return [
            // Application Details
            'application_type' => [50, 100], // placeholder
            'modification_reason' => [50, 105], // placeholder
            'license_type' => [50, 110], // placeholder
            'applicant_classification' => [50, 115], // placeholder
            'service_type' => [50, 120], // placeholder
            'others_service' => [50, 125], // placeholder
            'no_of_years' => [50, 130], // placeholder

            // Applicant Details
            'applicant' => [50, 140], // placeholder
            'unit' => [50, 160], // placeholder
            'street' => [50, 165], // placeholder
            'barangay' => [50, 170], // placeholder
            'city' => [50, 175], // placeholder
            'province' => [50, 180], // placeholder
            'zip_code' => [50, 185], // placeholder
            'contact_number' => [150, 120],
            'email' => [50, 120],
            'validity' => [50, 190], // placeholder
            'pa_ca_no' => [50, 195], // placeholder
            'service_area' => [50, 200], // placeholder
            'exact_location' => [50, 205], // placeholder
            'longitude' => [50, 210], // placeholder
            'latitude' => [50, 215], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-24
     */
    private static function getForm124Coordinates()
    {
        return [
            // Basic fields (placeholder - no specific model found)
            'first_name' => [50, 100],
            'last_name' => [150, 100],
            'email' => [50, 120],
            'contact_no' => [150, 120],
            'address' => [50, 140],
            'date_of_birth' => [50, 160],
            'place_of_birth' => [150, 160],
            'nationality' => [50, 180],
            'sex' => [150, 180],
            'civil_status' => [50, 200],
            'religion' => [150, 200],
        ];
    }

    /**
     * Get coordinates for Form 1-25
     */
    private static function getForm125Coordinates()
    {
        return [
            // Complainant Details
            'complainant_name' => [50, 100], // placeholder
            'postal_address' => [50, 105], // placeholder
            'email_address' => [50, 120], // placeholder
            'contact_number' => [150, 120],

            // Service Provider
            'business_name' => [50, 140], // placeholder
            'business_address' => [50, 145], // placeholder
            'provider_contact_number' => [50, 150], // placeholder

            // Nature of Complaint
            'complaint_type' => [50, 160], // placeholder
            'complaint_type_others' => [50, 165], // placeholder
            'incident_date' => [50, 170], // placeholder
            'incident_time' => [50, 175], // placeholder

            // Complaint Details
            'complaint_details' => [50, 200], // placeholder

            // Supporting Documents
            'supporting_documents' => [50, 220], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-26
     */
    private static function getForm126Coordinates()
    {
        return [
            // Affiant Details
            'affiant_name' => [50, 100], // placeholder
            'civil_status' => [50, 105], // placeholder
            'residence_address' => [50, 110], // placeholder

            // Text Messages
            'message1_datetime' => [50, 120], // placeholder
            'message1_phone' => [50, 125], // placeholder
            'message1_content' => [50, 130], // placeholder

            // Complaint Against
            'complaint_against' => [50, 200], // placeholder
        ];
    }

    /**
     * Get coordinates for a specific form type
     */
    public static function getCoordinates($formType)
    {
        $allMaps = self::getAllMaps();
        return $allMaps[$formType] ?? [];
    }

    /**
     * Get available form types
     */
    public static function getAvailableFormTypes()
    {
        return array_keys(self::getAllMaps());
    }
}
