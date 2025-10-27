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
            'date_of_birth' => [83.60, 110],
            'place_of_birth' => [83.60, 110],
            'nationality' => [146.60, 121.95],
            'sex' => [146.60, 117.85],
            'civil_status' => [83.60, 125],
            'religion' => [83.60, 125],
            'height' => [83.60, 125],
            'weight' => [83.60, 125],

            // Address Information
            'house_no' => [45, 140],
            'street' => [146.60, 126.05],
            'barangay' => [51.50, 130.30],
            'municipality' => [146.60, 131.55],
            'province' => [51.50, 134.50],
            'zip_code' => [146.60, 134.55],

            // Contact Information
            'contact_no' => [51.50, 139.00],
            'email' => [146.60, 138.75],

            // Education Information
            'school_attended' => [43, 143.00],
            'course_taken' => [43, 147.20],
            'year_graduated' => [146.60, 147.20],

            // Special Needs
            'needs' => [45, 215],
            'needs_details' => [120, 215],

            // Exam Type Selection (this will be placed in a specific area)
            'exam_type' => [16, 65.70],
        ];
    }

    /**
     * Get coordinates for Form 1-02
     */
    private static function getForm102Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-03
     */
    private static function getForm103Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-09
     */
    private static function getForm109Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-11
     */
    private static function getForm111Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-13
     */
    private static function getForm113Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-14
     */
    private static function getForm114Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-16
     */
    private static function getForm116Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-18
     */
    private static function getForm118Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-19
     */
    private static function getForm119Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-20
     */
    private static function getForm120Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-21
     */
    private static function getForm121Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-22
     */
    private static function getForm122Coordinates()
    {
        return [
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
     * Get coordinates for Form 1-24
     */
    private static function getForm124Coordinates()
    {
        return [
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
