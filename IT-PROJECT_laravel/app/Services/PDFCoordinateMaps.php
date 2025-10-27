<?php

namespace App\Services;

class PDFCoordinateMaps
{
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
            'first_name' => [45, 95],
            'middle_name' => [120, 95],
            'last_name' => [195, 95],
            'suffix' => [270, 95],
            'date_of_birth' => [45, 110],
            'place_of_birth' => [120, 110],
            'nationality' => [195, 110],
            'sex' => [270, 110],
            'civil_status' => [45, 125],
            'religion' => [120, 125],
            'height' => [195, 125],
            'weight' => [270, 125],

            // Address Information
            'house_no' => [45, 140],
            'street' => [120, 140],
            'barangay' => [45, 155],
            'municipality' => [120, 155],
            'province' => [195, 155],
            'zip_code' => [270, 155],

            // Contact Information
            'contact_no' => [45, 170],
            'email' => [195, 170],

            // Education Information
            'school_attended' => [45, 185],
            'course_taken' => [45, 200],
            'year_graduated' => [195, 200],

            // Special Needs
            'needs' => [45, 215],
            'needs_details' => [120, 215],

            // Exam Type Selection (this will be placed in a specific area)
            'exam_type' => [45, 80],
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
