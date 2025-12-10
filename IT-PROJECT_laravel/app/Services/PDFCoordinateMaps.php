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
     * Certificate page dimensions in points (A4 Landscape)
     * Certificate = 11.69" × 8.28" (landscape) = 841.89 × 596.16 points
     * Page count: 1
     */
    const CERT_WIDTH = 297.24;
    const CERT_HEIGHT = 210.16;

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
     * Get Certificate page size information
     */
    public static function getCertificatePageSize()
    {
        return [
            'width' => self::CERT_WIDTH,
            'height' => self::CERT_HEIGHT,
            'width_inches' => 11.69,
            'height_inches' => 8.28,
            'orientation' => 'landscape',
            'page_count' => 1
        ];
    }

    /**
     * Get all coordinate maps for PDF forms
     */
    public static function getAllMaps()
    {
        $maps = [
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

        foreach ($maps as $formType => $coordinates) {
            $maps[$formType] = array_merge(
                $coordinates,
                self::getSupplementalCoordinates($formType)
            );
        }

        return $maps;
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
                'female' => [183.60, 117.85],
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

            // Attachment placeholders
            'id_picture_slot' => [175.60, 31.40], // top-left corner in mm
            'id_picture_slot_size' => [25.40, 25.40], // default width/height in mm (1x1 in)
            'id_picture_slot_secondary' => [175.60, 217.87], // placeholder for secondary photo box
            'id_picture_slot_secondary_size' => [25.40, 25.40],

            // Exam Type Selection placeholders: position per option (mark 'X' at these coords)
            // Update these coordinates to match the exact checkbox locations on the template
            'exam_type' => [17, 65.70], // fallback position if specific option not mapped
            'exam_type_positions' => [
                // Radiotelegraphy
                '1rtg_e1256_code25' => [17, 65.70],
                '1rtg_code25' => [17, 69.70],
                '2rtg_e1256_code16' => [17, 73.70],
                '2rtg_code16' => [17, 77.70],
                '3rtg_e125_code16' => [16, 81.70],
                '3rtg_code16' => [17, 85.70],

                // Amateur
                'class_a_e8910_code5' => [121.10, 65.70],
                'class_a_code5_only' => [121.10, 69.70],
                'class_b_e567' => [121.10, 73.70],
                'class_b_e2' => [121.10, 77.70],
                'class_c_e234' => [121.10, 81.70],
                'class_d_e2' => [121.10, 85.70],

                // Radiotelephony
                '1phn_e1234' => [17, 95.70],
                '2phn_e123' => [17, 99.70],
                '3phn_e12' => [17, 103.70],

                // Restricted Radiotelephone
                'rroc_aircraft_e1' => [121.10, 95.70],
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
            'middle_name' => [30.30, 158.30], // placeholder

            // Personal info
            'dob' => [162, 147.70],
            'sex' => [30.30, 163.50],
            'sex_positions' => [
                'male' => [30.30, 163.50],
                'female' => [70.75, 163.50], // placeholder
            ],
            'nationality' => [30.30, 168.90],

            // Address fields
            'unit' => [48, 174], // placeholder
            'street' => [135, 174], // placeholder
            'barangay' => [48, 179.5], // placeholder
            'city' => [135, 179.5], // placeholder
            'province' => [48, 185], // placeholder
            'zip_code' => [135, 185], // placeholder
            'contact_number' => [48, 190],
            'email' => [135.50, 190.00],

            // Application type fields
            'application_type' => [23, 100], // placeholder
            'application_type_positions' => [
                'new' => [23, 100],
                'renewal' => [23, 105.5],
                'modification' => [23, 111]
            ],
            'modification_reason' => [50, 175], // placeholder
            'years' => [40.87, 126.89], // placeholder

            // Physical info
            'height' => [187, 152.70], // placeholder
            'weight' => [144, 152.70], // placeholder

            // Employment status checkboxes
            'employment_status_positions' => [
                'unemployed' => [171.90, 157.96], // checkbox for unemployed
                'employed' => [135.87, 157.96],   // checkbox for employed (adjust Y coordinate as needed)
            ],

            // Employment type checkboxes
            'employment_type_positions' => [
                'local' => [145, 163.30],   // checkbox for local
                'foreign' => [145, 168.90], // checkbox for foreign (adjust Y coordinate as needed)
            ],

            // Certificate type checkboxes - positions for each option
            'certificate_type_positions' => [
                // ROC variants (uppercase as used in form)
                '1RTG' => [101.32, 100.12],              // 1RTG (First-class Radiotelegraph Operator Certificate)
                '2RTG' => [101.32, 105.86],              // 2RTG (Second-class Radiotelegraph Operator Certificate)
                '3RTG' => [101.32, 111.20],              // 3RTG (Third-class Radiotelegraph Operator Certificate)
                '1PHN' => [101.32, 116.60],              // 1PHN (First-class Radiotelephone Operator Certificate)
                '2PHN' => [101.32, 122.20],              // 2PHN (Second-class Radiotelephone Operator Certificate)
                '3PHN' => [101.32, 127.80],              // 3PHN (Third-class Radiotelephone Operator Certificate)
                // RROC, SROP, GROC variants (as used in form)
                'SROP' => [136.24, 100.12],              // SROP (Special Radio Operator's Permit)
                'RROC-Land Mobile' => [136.24, 105.30],  // RROC-Land Mobile (Restricted Radiotelephone Operator's Certificate for Land Mobile Station)
                'RROC-Aircraft' => [136.24, 111.30],     // RROC-Aircraft (Restricted Radiotelephone Operator's Certificate – Aircraft)
                'GROC' => [136.24, 116.70],              // GROC (Government Radio Operator Certificate)
                'TP RROC-Aircraft' => [136.24, 121.60],  // TP RROC-Aircraft (Foreign Pilot)
            ],

            // Exam fields
            'exam_place' => [48, 201], // placeholder
            'exam_date' => [135.50, 201], // placeholder
            'rating' => [187, 201], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-03
     */
    private static function getForm103Coordinates()
    {
        return [
            // Applicant name fields
            'last_name' => [39, 143.70],
            'first_name' => [39, 148.90],
            'middle_name' => [39, 154.30], // placeholder

            // Personal info
            'dob' => [162, 143.70],
            'sex' => [145, 160],
            'sex_positions' => [
                'male' => [140, 149],
                'female' => [155, 180], // placeholder
            ],
            'nationality' => [137, 154.50],

            // Address fields
            'unit' => [55, 165], // placeholder
            'street' => [136, 165], // placeholder
            'barangay' => [55, 170.50], // placeholder
            'city' => [136, 170.50], // placeholder
            'province' => [55, 175.50], // placeholder
            'zip_code' => [136, 175.50], // placeholder
            'contact_number' => [55, 181],
            'email' => [136, 181],

            // Application type fields
            'application_type' => [33, 82], // placeholder
            'modification_reason' => [50, 205], // placeholder
            'years' => [50, 210], // placeholder

            // Exam fields
            'exam_place' => [55, 191], // placeholder
            'exam_date' => [144, 191], // placeholder
            'rating' => [185, 191], // placeholder

            // License info
            'atroc_arsl_no' => [103, 159.50], // placeholder
            'call_sign' => [39, 159.50], // placeholder
            'validity' => [181, 159.50], // placeholder
            'station_class' => [162, 82], // placeholder
            'certificate_type' => [89, 87], // placeholder
            //Needs placeholders for other permit types
            'club_name' => [121, 108.50], // placeholder
            'assigned_frequency' => [121, 114], // placeholder
            'preferred_call_sign' => [133.50, 140], // placeholder

            //Needs coords for equipment particulars
        ];
    }

    /**
     * Get coordinates for Form 1-09
     */
    private static function getForm109Coordinates()
    {
        return [
            // Address fields
            'unit' => [53, 142], // placeholder
            'street' => [150, 142], // placeholder
            'barangay' => [53, 147.50], // placeholder
            'city' => [150, 147.50], // placeholder
            'province' => [53, 153], // placeholder
            'zip_code' => [150, 153], // placeholder
            'contact_number' => [53, 158],
            'email' => [150, 158],

            // Applicant details
            'applicant' => [53, 132], // placeholder
            'validity' => [150, 137], // placeholder
            'cpc_cpcn_pa_rsl_no' => [53, 137], // placeholder

            // Application details
            'application_type' => [31, 79], // placeholder
            //Needs coords for alt_types
            'radio_service' => [95.50, 79], // placeholder
            //Needs coords for alt types
            'others_specify' => [160, 95], // placeholder
            'nature_service' => [31, 108.50], // placeholder
            //Needs coords for alt types
            'rt_units' => [94, 108.50], // placeholder
            'fx_units' => [94, 114], // placeholder
            'fb_units' => [94, 119.50], // placeholder
            'ml_units' => [118.50, 108.50], // placeholder
            'p_units' => [118.50, 114], // placeholder
            'bc_units' => [118.50, 119.50], // placeholder
            'fc_units' => [142.50, 108.50], // placeholder
            'fa_units' => [142.50, 114], // placeholder
            'ma_units' => [142.50, 119.50], // placeholder
            'tc_units' => [168, 108.50], // placeholder
            'others_station_specify' => [176, 119], // placeholder
            'others_station_units' => [168, 114], // placeholder

            // Station Equipment
            'exact_location' => [61.50, 169], // placeholder
            'longitude' => [61.50, 174], // placeholder
            'latitude' => [61.50, 179.50], // placeholder
            'points_of_comm' => [61.50, 185], // placeholder
            'frequency' => [61.50, 190.50], // placeholder
            'make_type_model' => [160, 169], // placeholder
            'serial_number' => [160, 174], // placeholder
            'bandwidth_emission' => [160, 179.50], // placeholder
            'power_output' => [160, 184], // placeholder
            'frequency_range' => [160, 190.50], // placeholder

            // Source of Equipment
            'dealer_name' => [53, 200], // placeholder
            'authorized_seller_buyer' => [53, 205.50], // placeholder
            'or_invoice_no' => [160, 200], // placeholder
            'permit_rsl_no' => [160, 205.50], // placeholder

            // Intended Use
            'intended_use' => [22, 217], // placeholder
            //Needs coords for alt types
            'others_use_specify' => [120, 228], // placeholder
            'storage_location' => [50, 360], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-11
     */
    private static function getForm111Coordinates()
    {
        return [
            // Application type fields
            'application_type' => [29, 74], // placeholder
            'application_type_positions' => [
                'new' => [23, 100],
                'renewal' => [23, 105.5],
                'modification' => [23, 111]
            ],
            'modification_reason' => [50, 105], // placeholder
            'permit_type' => [29, 103], // placeholder
            //Needs coords for alternative type
            'years' => [52, 108], // placeholder
            'radio_service' => [97, 74], // placeholder
            'others_specify' => [167, 84], // placeholder

            // Applicant details
            'unit' => [43, 146.50], // placeholder
            'street' => [145, 146.50], // placeholder
            'barangay' => [43, 151.50], // placeholder
            'city' => [145, 151.50], // placeholder
            'province' => [43, 157], // placeholder
            'zip_code' => [145, 157], // placeholder
            'contact_number' => [43, 162],
            'email' => [145, 162],

            'applicant' => [43, 141.50], // placeholder
            'validity' => [43, 226.50], // placeholder

            // Station Units
            'rt_units' => [97, 113], // placeholder
            'fx_units' => [97, 118.50], // placeholder
            'fb_units' => [97, 124], // placeholder
            'ml_units' => [121.50, 113], // placeholder
            'p_units' => [121.50, 118.50], // placeholder
            'bc_units' => [121.50, 124], // placeholder
            'fc_units' => [146, 113], // placeholder
            'fa_units' => [146, 118.50], // placeholder
            'ma_units' => [146, 124], // placeholder
            'tc_units' => [170.50, 113], // placeholder
            'others_station_specify' => [170.50, 118.50], // placeholder
            'others_station_units' => [177, 124], // placeholder

            // Station Equipment
            'exact_location' => [43, 178], // placeholder
            'longitude' => [43, 183.50], // placeholder
            'latitude' => [95, 183.50], // placeholder
            'points_of_comm' => [43, 189], // placeholder
            'assigned_freq' => [43, 199.50], // placeholder
            'bandwidth_emission' => [43, 205], // placeholder
            'configuration' => [43, 210.50], // placeholder
            'data_rate' => [43, 216], // placeholder
            'call_sign' => [95, 216], // placeholder
            'rsl_no' => [43, 221.50], // placeholder

            'make_type_model' => [152.50, 178], // placeholder
            'serial_number' => [152.50, 183.50], // placeholder

            'power_output' => [152.50, 189], // placeholder
            'frequency_range' => [152.50, 194.50], // placeholder
            'others_station' => [43, 232], // placeholder

            //Antenna data members
            'antenna_type' => [137, 205], // placeholder
            'antenna_height' => [137, 210.50], // placeholder
            'antenna_gain' => [179, 210.50], // placeholder
            'antenna_directivity' => [137, 216], // placeholder
            'antenna_polarization' => [137, 221], // placeholder
            'antenna_beamwidth' => [137, 226.50], // placeholder
            'antenna_diameter' => [161, 231], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-13
     */
    private static function getForm113Coordinates()
    {
        return [
            // Applicant
            'applicant' => [43, 54], // placeholder

            // Particulars - Authorized vs Proposed
            'authorized_exact_location' => [57, 84], // placeholder
            'proposed_exact_location' => [126.50, 84], // placeholder
            'authorized_longitude' => [57, 89.50], // placeholder
            'proposed_longitude' => [126.50, 89.50], // placeholder
            'authorized_latitude' => [57, 95], // placeholder
            'proposed_latitude' => [126.50, 95], // placeholder
            'authorized_points_of_comm' => [57, 100.5], // placeholder
            'proposed_points_of_comm' => [126.50, 100.5], // placeholder
            'authorized_assigned_freq' => [57, 106], // placeholder
            'proposed_assigned_freq' => [126.50, 106], // placeholder
            'authorized_bw_emission' => [57, 111.50], // placeholder
            'proposed_bw_emission' => [126.50, 111.50], // placeholder
            'authorized_configuration' => [57, 116], // placeholder
            'proposed_configuration' => [126.50, 116], // placeholder
            'authorized_data_rate' => [57, 121], // placeholder
            'proposed_data_rate' => [126.50, 121], // placeholder
            'authorized_make_type_model' => [57, 131.50], // placeholder
            'proposed_make_type_model' => [126.50, 131.50], // placeholder
            'authorized_serial_no' => [57, 137], // placeholder
            'proposed_serial_no' => [126.50, 137], // placeholder
            'authorized_power_output' => [57, 142.50], // placeholder
            'proposed_power_output' => [126.50, 142.50], // placeholder
            'authorized_freq_range' => [57, 148], // placeholder
            'proposed_freq_range' => [126.50, 148], // placeholder
            'authorized_others_1' => [57, 159], // placeholder
            'proposed_others_1' => [126.50, 159], // placeholder
            'authorized_others_2' => [57, 164], // placeholder
            'proposed_others_2' => [126.50, 164], // placeholder
            'authorized_others_3' => [57, 169], // placeholder
            'proposed_others_3' => [126.50, 169], // placeholder
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
            'place_of_origin' => [43, 81], // placeholder
            'purpose' => [43, 99.50], // placeholder
            'destination' => [43, 89.50], // placeholder

            // Application Information
            'applicant' => [51.50, 113], // placeholder
            'validity' => [150, 118.50], // placeholder
            'permit_rsl_no' => [51.50, 118.50], // placeholder
            'unit' => [51.50, 124], // placeholder
            'street' => [150, 124], // placeholder
            'barangay' => [51.50, 129.50], // placeholder
            'city' => [150, 129.50], // placeholder
            'province' => [51.50, 134.50], // placeholder
            'zip_code' => [150, 134.50], // placeholder
            'contact_number' => [51.50, 139.50],
            'email' => [150, 139.50],

            // Proposed Equipment
            'equipment1_make' => [51.50, 155.50], // placeholder
            'equipment1_serial' => [51.50, 161], // placeholder
            'equipment2_make' => [100, 155.50], // placeholder
            'equipment2_serial' => [100, 161], // placeholder
            'equipment3_make' => [148.50, 155.50], // placeholder
            'equipment3_serial' => [148.50, 161], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-18
     */
    private static function getForm118Coordinates()
    {
        return [
            // Application Details
            'application_type' => [29, 88], // placeholder
            //Needs coords for alt types
            'modification_reason' => [35, 104.50], // placeholder
            'application_category' => [102, 88], // placeholder
            //Needs coords for subtypes

            // Applicant Details
            'applicant' => [36, 155], // placeholder
            'permit_no' => [36, 165.50], // placeholder
            'validity' => [132.50, 175.50], // placeholder
            'entity_type' => [37, 165], // placeholder
            //Needs coords for alt types
            'others_entity' => [142, 170.50], // placeholder

            // Address fields
            'unit' => [43, 181], // placeholder
            'street' => [132.50, 181], // placeholder
            'barangay' => [43, 186], // placeholder
            'city' => [132.50, 186.50], // placeholder
            'province' => [43, 191.50], // placeholder
            'zip_code' => [132.50, 191.50], // placeholder
            'contact_number' => [43, 196.50],
            'email' => [132.50, 196.50],

            // Personnel Required
            'supervising_engineer_name' => [43, 213], // placeholder
            'supervising_engineer_pece' => [43, 218.50], // placeholder
            'supervising_engineer_validity' => [43, 224], // placeholder
            'technician_name' => [148.50, 213], // placeholder
            'technician_certificate' => [148.50, 218.50], // placeholder
            'technician_validity' => [148.50, 224], // placeholder
        ];
    }

    /**
     * Get coordinates for Form 1-19
     */
    private static function getForm119Coordinates()
    {
        return [
            // Type of Equipment
            'equipment_type' => [29, 83], // placeholder
            //Needs coords for other types

            // Applicant Details
            'applicant' => [34, 117.50], // placeholder
            'unit' => [50, 122.50], // placeholder
            'street' => [133, 122.50], // placeholder
            'barangay' => [50, 128], // placeholder
            'city' => [133, 128], // placeholder
            'province' => [50, 133.50], // placeholder
            'zip_code' => [133, 133.50], // placeholder
            'contact_number' => [50, 139],
            'email' => [133, 139],
            'validity' => [150, 149.50], // placeholder
            'permit_import_no' => [50, 144], // placeholder
            'invoice_no' => [133, 144], // placeholder
            'cpcn_pa_rsl_no' => [50, 149.50], // placeholder

            // Equipment and Devices
            'equipment1_make' => [10, 165], // placeholder
            'equipment1_quantity' => [76, 165], // placeholder
            'equipment1_serial' => [140, 165], // placeholder
            //Needs coords for other equipment
        ];
    }

    /**
     * Get coordinates for Form 1-20
     */
    private static function getForm120Coordinates()
    {
        return [
            // Application Details
            'application_type' => [23, 73], // placeholder
            //Needs placeholder for other types
            'modification_reason' => [29, 89], // placeholder
            'service_category' => [88, 73], // placeholder
            //Needs coords for other types

            // Applicant Details
            'applicant' => [37, 113], // placeholder
            'unit' => [53, 118], // placeholder
            'street' => [143, 118], // placeholder
            'barangay' => [53, 123], // placeholder
            'city' => [143, 123], // placeholder
            'province' => [53, 128.50], // placeholder
            'zip_code' => [143, 128.50], // placeholder
            'contact_number' => [53, 134],
            'email' => [143, 134],
            'cpcn_pa_ca_no' => [53, 150], // placeholder
            'cpcn_validity' => [168, 150], // placeholder
            'cor_no' => [53, 155], // placeholder
            'cor_validity' => [168, 155], // placeholder
            'known_by_another_name' => [23, 165.50], // placeholder for 'yes'
            //Needs coords for other types
            'former_name' => [78, 165.50], // placeholder

            // Value Added Service
            'vas_services' => [15, 184], // placeholder
            //Needs coords for other types
            'others_vas' => [101, 221], // placeholder

            //Needs coords for entity type
        ];
    }

    /**
     * Get coordinates for Form 1-21
     */
    private static function getForm121Coordinates()
    {
        return [
            // Applicant Details
            'applicant' => [51, 86], // placeholder
            'unit' => [51, 91.50], // placeholder
            'street' => [148.50, 91.50], // placeholder
            'barangay' => [51, 97], // placeholder
            'city' => [148.50, 97], // placeholder
            'province' => [51, 102.50], // placeholder
            'zip_code' => [148.50, 102.50], // placeholder
            'contact_number' => [51, 108],
            'email' => [148.50, 108],

            // Permit License Details
            'permit_license_certificate_no' => [59, 118], // placeholder
            'validity' => [148.50, 118], // placeholder

            // Circumstances
            'circumstances' => [10, 128], // placeholder
            //Needs line increments - each new line = +5.50 mm in y-coord
        ];
    }

    /**
     * Get coordinates for Form 1-22
     */
    private static function getForm122Coordinates()
    {
        return [
            // Application Details
            'application_type' => [27, 81], // placeholder
            //Needs coords for alt types
            'modification_reason' => [33, 105], // placeholder
            'license_type' => [88, 81], // placeholder
            //Needs coords for alt types
            'applicant_classification' => [27, 111.50], // placeholder
            //Needs coords for alt types
            'service_type' => [88, 111.50], // placeholder
            //Needs coords for alt types
            'others_service' => [88, 122], // placeholder
            'no_of_years' => [177.50, 106.50], // placeholder

            // Applicant Details
            'applicant' => [43, 134.50], // placeholder
            'unit' => [43, 139.50], // placeholder
            'street' => [137, 139.50], // placeholder
            'barangay' => [43, 145], // placeholder
            'city' => [137, 145], // placeholder
            'province' => [43, 150.50], // placeholder
            'zip_code' => [137, 150.50], // placeholder
            'contact_number' => [43, 155.50],
            'email' => [137, 155.50],
            'validity' => [137, 161], // placeholder
            'pa_ca_no' => [43, 161], // placeholder
            'service_area' => [43, 166.50], // placeholder
            'exact_location' => [43, 172], // placeholder
            'longitude' => [161, 172], // placeholder
            'latitude' => [161, 177], // placeholder

            //Needs coords for Particulars of Equipment, Antenna System, and Signal
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
            'complainant_name' => [50, 86.50], // placeholder
            'postal_address' => [50, 92], // placeholder
            'email_address' => [50, 97], // placeholder
            'contact_number' => [50, 102.50],

            // Service Provider
            'business_name' => [50, 112.50], // placeholder
            'business_address' => [50, 118], // placeholder
            'provider_contact_number' => [50, 123.50], // placeholder

            // Nature of Complaint
            'complaint_type' => [12, 134], // placeholder
            //Needs coords for alt types
            'complaint_type_others' => [76, 150.50], // placeholder
            'incident_date' => [68, 160], // placeholder
            'incident_time' => [68, 165.50], // placeholder

            // Complaint Details
            'complaint_details' => [12, 181], // placeholder
            //Needs line increments

            // Supporting Documents
            'supporting_documents' => [12, 208], // placeholder
            //Needs line increments and cell placement
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
     * Get supplemental placeholders shared across all templates
     */
    private static function getSupplementalCoordinates($formType)
    {
        return array_merge(
            self::getAdmissionSlipCoordinates(),
            self::getOfficialReceiptCoordinates($formType)
        );
    }

    /**
     * Admission Slip placeholders (update exact coordinates per template as needed)
     */
    private static function getAdmissionSlipCoordinates()
    {
        return [
            'admit_name' => [60.77, 221.90], // placeholder
            'mailing_address' => [60.77, 226.90], // placeholder
            'mailing_address_line2' => [60.77, 230.90], // placeholder for extended address field
            'admission_exam_type' => [60.77, 234.80],  // placeholder (formatted exam type)
            'place_of_exam' => [60.77, 240.80], // placeholder
            'date_of_exam' => [60.77, 244.44], // placeholder
            'date_of_exam_line2' => [153.96, 104.04], // placeholder for extended date field
            'time_of_exam' => [60.77, 248.64], // placeholder
            'authorized_officer' => [140.00, 253.82], // placeholder
        ];
    }

    /**
     * Official Receipt placeholders (update exact coordinates per template as needed)
     */
    private static function getOfficialReceiptCoordinates($formType)
    {
        $default = [
            'or_no' => [166.50, 180.58],
            'or_amount' => [158.52, 190.04],
            'collecting_officer' => [152.22, 196.16],
            'or_date' => [168.16, 186.33],
            'or_year_suffix' => [189.67, 186.33],
        ];

        // Override coordinates for specific form types for Declaration
        $overrides = [
            '1-01' => [
                'or_no' => [166.50, 180.58],
                'or_amount' => [158.52, 190.04],
                'collecting_officer' => [152.22, 196.16],
                'or_date' => [168.16, 186.33],
                'or_year_suffix' => [189.67, 186.33],
            ],
        ];

        $overrides = [
            '1-02' => [
                'or_no' => [166.50, 233.05],
                'or_amount' => [158.52, 243.06],
                'collecting_officer' => [152.22, 248.81],
                'or_date' => [164.16, 238.61],
                'or_year_suffix' => [183.67, 238.61],
            ],
        ];

        return $overrides[$formType] ?? $default;
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

    /**
     * Get certificate coordinates for Form 1-02
     * These are placeholder coordinates - adjust based on actual Sample_Cert.pdf template
     */
    public static function getCertificateCoordinates($formType)
    {
        // Placeholder coordinates for certificate fields
        // TODO: Adjust these coordinates to match the exact positions on Sample_Cert.pdf
        return [
            'last_name' => [61.24, 77.26],    // X: 50mm, Y: 100mm - PLACEHOLDER
            'first_name' => [61.24, 108.34],   // X: 50mm, Y: 110mm - PLACEHOLDER
            'middle_name' => [61.24, 139.66],  // X: 50mm, Y: 120mm - PLACEHOLDER
            'certificate_type' => [61.24, 23.83],  // X: 50mm, Y: 130mm - PLACEHOLDER
            'issuance_date' => [30.34, 161.57],  // X: 50mm, Y: 140mm - PLACEHOLDER
            'expiry_date' => [175.62, 161.57],  // X: 50mm, Y: 150mm - PLACEHOLDER
        ];
    }
}
