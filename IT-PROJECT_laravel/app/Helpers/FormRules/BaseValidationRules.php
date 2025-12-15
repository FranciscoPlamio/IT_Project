<?php

namespace App\Helpers\FormRules;

/**
 * Base validation rules trait containing common field validation patterns.
 * 
 * This trait provides reusable, strict validation rules for common fields
 * like names (letters only), contact numbers (digits only), emails, etc.
 */
trait BaseValidationRules
{
    /**
     * Get strict name validation rules.
     * Only allows letters (including accented), spaces, hyphens, and apostrophes.
     * No numbers allowed.
     *
     * @param bool $required Whether the field is required
     * @param int $minLength Minimum character length
     * @param int $maxLength Maximum character length
     * @return array
     */
    public static function nameRules(bool $required = true, int $minLength = 2, int $maxLength = 50): array
    {
        $rules = [
            'string',
            "min:{$minLength}",
            "max:{$maxLength}",
            // Only letters (including accented characters), spaces, hyphens, and apostrophes
            // No numbers or special characters allowed
            'regex:/^[A-Za-zÀ-ÖØ-öø-ÿÑñ\s\'\-]+$/u'
        ];

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get Philippine mobile number validation rules.
     * Must start with 09 and have 11 digits total.
     *
     * @param bool $required Whether the field is required
     * @return array
     */
    public static function phMobileRules(bool $required = true): array
    {
        $rules = [
            'string',
            // Philippine mobile number: starts with 09, followed by 9 digits
            'regex:/^09\d{9}$/'
        ];

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get general contact number validation rules.
     * Only allows 10-11 digits, no letters or special characters.
     *
     * @param bool $required Whether the field is required
     * @return array
     */
    public static function contactNumberRules(bool $required = true): array
    {
        $rules = [
            'string',
            // Only digits, 10-11 characters
            'regex:/^\d{10,11}$/'
        ];

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get email validation rules with provider restrictions.
     * Only allows Gmail, Yahoo, or Outlook addresses.
     *
     * @param bool $required Whether the field is required
     * @param int $minLength Minimum character length
     * @param int $maxLength Maximum character length
     * @return array
     */
    public static function emailRules(bool $required = true, int $minLength = 6, int $maxLength = 30): array
    {
        $rules = [
            'email',
            "min:{$minLength}",
            "max:{$maxLength}",
            // Gmail, Yahoo, or Outlook only
            // Alphanumeric with periods, cannot start or end with period
            'regex:/^[A-Za-z0-9](?:[A-Za-z0-9\.]{4,28}[A-Za-z0-9])@(gmail|yahoo|outlook)\.com$/i'
        ];

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get date of birth validation rules.
     * Must be at least 18 years old and at most 70 years old.
     *
     * @param bool $required Whether the field is required
     * @param int $minAge Minimum age in years
     * @param int $maxAge Maximum age in years
     * @return array
     */
    public static function dobRules(bool $required = true, int $minAge = 18, int $maxAge = 70): array
    {
        $rules = [
            'date',
            'before_or_equal:' . now()->subYears($minAge)->toDateString(),
            'after_or_equal:' . now()->subYears($maxAge)->toDateString(),
        ];

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get integer/numeric field validation rules.
     * Only allows whole numbers.
     *
     * @param bool $required Whether the field is required
     * @param int|null $min Minimum value
     * @param int|null $max Maximum value
     * @return array
     */
    public static function integerRules(bool $required = true, ?int $min = null, ?int $max = null): array
    {
        $rules = ['integer'];

        if ($min !== null) {
            $rules[] = "min:{$min}";
        }
        if ($max !== null) {
            $rules[] = "max:{$max}";
        }

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get numeric field validation rules (allows decimals).
     *
     * @param bool $required Whether the field is required
     * @param float|null $min Minimum value
     * @param float|null $max Maximum value
     * @return array
     */
    public static function numericRules(bool $required = true, ?float $min = null, ?float $max = null): array
    {
        $rules = ['numeric'];

        if ($min !== null) {
            $rules[] = "min:{$min}";
        }
        if ($max !== null) {
            $rules[] = "max:{$max}";
        }

        if ($required) {
            array_unshift($rules, 'required');
        } else {
            array_unshift($rules, 'nullable');
        }

        return $rules;
    }

    /**
     * Get common validation error messages for name fields.
     *
     * @return array
     */
    public static function nameMessages(): array
    {
        return [
            'last_name.regex' => 'Last name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
            'first_name.regex' => 'First name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
            'middle_name.regex' => 'Middle name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
            'last_name.min' => 'Last name must be at least :min characters.',
            'first_name.min' => 'First name must be at least :min characters.',
            'middle_name.min' => 'Middle name must be at least :min characters.',
        ];
    }

    /**
     * Get common validation error messages for contact number fields.
     *
     * @return array
     */
    public static function contactMessages(): array
    {
        return [
            'contact_number.regex' => 'Contact number must be a valid 11-digit Philippine mobile number starting with 09 (e.g., 09171234567).',
        ];
    }

    /**
     * Get common validation error messages for email fields.
     *
     * @return array
     */
    public static function emailMessages(): array
    {
        return [
            'email.regex' => 'Email address must meet the following conditions:
<ul class="list-disc pl-6 mt-1">
    <li>Use a Gmail, Yahoo, or Outlook address</li>
    <li>Minimum of 6 characters and maximum of 30 characters</li>
    <li>Only letters, numbers, and periods (.) are allowed</li>
    <li>Cannot start or end with a period (.)</li>
    <li>No consecutive periods (..)</li>
</ul>',
        ];
    }

    /**
     * Get common validation error messages for date of birth fields.
     *
     * @return array
     */
    public static function dobMessages(): array
    {
        return [
            'dob.before_or_equal' => 'You must be at least 18 years old.',
            'dob.after_or_equal' => 'Invalid date of birth. Maximum age is 70 years.',
            'dob.required' => 'Date of birth is required.',
        ];
    }

    /**
     * Get all common validation messages combined.
     *
     * @return array
     */
    public static function allCommonMessages(): array
    {
        return array_merge(
            self::nameMessages(),
            self::contactMessages(),
            self::emailMessages(),
            self::dobMessages()
        );
    }
}
