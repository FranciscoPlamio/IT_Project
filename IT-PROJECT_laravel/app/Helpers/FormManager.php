<?php

namespace App\Helpers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class FormManager
{
    /**
     * Dynamically get the form model instance by form type.
     *
     * @param string $formType Example: 'form1_01'
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getFormModel(string $formType)
    {
        $class = "\\App\\Models\\Forms\\" . self::convertType(($formType));
        if (!class_exists($class)) {
            throw new \Exception("Form model {$class} does not exist.");
        }
        return new $class;
    }

    /**
     * Save or update a form along with its meta.
     *
     * @param string $formType Example: 'form1_01'
     * @param string $formToken
     * @param array $formData
     * @param array $transactionData Optional: status, payment, remarks, etc.
     * @param string $userId
     * @return array ['form' => ..., 'meta' => ...]
     */
    public static function saveForm(
        string $formType,
        string $formToken,
        array $formData,
        string $userId,
        array $transactionData = []
    ) {
        // Gets the Model of Form
        $formModel = self::getFormModel($formType);

        // Save or update the main form
        $form = $formModel::updateOrCreate(
            ['form_token' => $formToken],
            $formData
        );

        // Default meta fields
        $defaultMeta = [
            'form_id' => $form->_id,
            'form_token' => $formToken,
            'form_type' => $formType,
            'user_id' => $userId,
            'status' => $transactionData['status'] ?? 'pending',
            'payment_status' => $transactionData['payment_status'] ?? 'pending',
            'payment_method' => $transactionData['payment_method'] ?? null,
            'payment_reference' => self::generateReferenceNumber(),
            'payment_amount' => $transactionData['payment_amount'] ?? null,
            'payment_date' => $transactionData['payment_date'] ?? null,
            'remarks' => $transactionData['remarks'] ?? null,
        ];

        // Save or update the form meta
        $meta = FormsTransactions::updateOrCreate(
            ['form_token' => $formToken],
            $defaultMeta
        );

        return ['form' => $form, 'meta' => ''];
    }

    /**
     * Get validation rules for a specific form
     *
     * Each form has its own rules file in app/Helpers/FormsRules
     *
     * @param string $formType
     * @return array
     */
    public static function getValidationRules(string $formType): array
    {

        $formType = str_replace('-', '_', $formType);
        $rulesClass = "\\App\\Helpers\\FormRules\\Form" . $formType . "Rules";
        if (!class_exists($rulesClass)) {
            throw new \Exception("Validation rules class not found for {$formType}");
        }
        return $rulesClass::rules();
    }

    public static function convertType(string $formType)
    {
        return ucfirst(str_replace('-', '_', $formType));
    }

    public static function generateReferenceNumber($length = 10)
    {
        return strtoupper(Str::random($length));
    }

    /**
     * Add universal validation to a form
     *
     * @return string
     */
    public static function addValidation()
    {
        return View::make('components.forms.universal-validation')->render();
    }

    /**
     * Initialize form with validation and any additional setup
     *
     * @param string $formId The ID of the form to initialize
     * @return string
     */
    public static function initializeForm($formId)
    {
        return self::addValidation() . "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('$formId');
                if (form) {
                    // Any additional form-specific initialization can go here
                    console.log('Form $formId initialized with universal validation');
                }
            });
        </script>";
    }
}
