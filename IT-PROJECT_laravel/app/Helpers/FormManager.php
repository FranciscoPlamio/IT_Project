<?php

namespace App\Helpers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Support\Str;

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
     * @param string $paymentMethod
     * @return array ['form' => ..., 'meta' => ...]
     */
    public static function saveForm(
        string $formType,
        string $formToken,
        array $formData,
        string $userId,
        string $paymentMethod,
        array $transactionData = [],
    ) {
        // Gets the Model of Form
        $formModel = self::getFormModel($formType);

        //Form 1-01 Payment
        if ($formType === "form1-01") {
            $transactionData['payment_amount'] = 50;
            $form = $formModel::updateOrCreate(
                ['form_token' => $formToken],
                array_merge($formData, [
                    'admission_slip' => null,
                    'or' => null
                ])
            );

            //Form 1-02 Payment
        } elseif ($formType === "form1-02") {
            //Modification
            if ($formData['application_type'] === "modification") {
                $transactionData['payment_amount'] = 150;

                //New
            } else if ($formData['application_type'] === "new") {
                $feeTable = [
                    "1RTG" => ["roc" => 180, "dst" => 30],
                    "2RTG" => ["roc" => 120, "dst" => 30],
                    "3RTG" => ["roc" => 60, "dst" => 30],
                    "1PHN" => ["roc" => 120, "dst" => 30],
                    "2PHN" => ["roc" => 100, "dst" => 30],
                    "3PHN" => ["roc" => 60, "dst" => 30],
                    "RROC-Aircraft" => ["roc" => 100, "dst" => 30],
                    "SROP" => ["roc" => 60, "dst" => 30],
                    "GROC" => ["roc" => 60, "dst" => 30],
                    "RROC-RLM" => ["roc" => 60, "dst" => 30],
                ];

                $certificate = $formData['certificate_type'];
                $years = (int) $formData['years'];

                // fallback safety check
                if (isset($feeTable[$certificate])) {

                    $roc = $feeTable[$certificate]['roc'];
                    $dst = $feeTable[$certificate]['dst'];

                    $fee = ($roc * $years) + $dst;

                    $transactionData['payment_amount'] = $fee;
                }
            }

            $form = $formModel::updateOrCreate(
                ['form_token' => $formToken],
                array_merge($formData, [
                    'certificate' => null,
                    'or' => null
                ])
            );
        } else {
            $form = $formModel::updateOrCreate(
                ['form_token' => $formToken],
                $formData
            );
        }
        // Save or update the main form


        // Default meta fields
        $defaultMeta = [
            'form_id' => $form->_id,
            'form_token' => $formToken,
            'form_type' => $formType,
            'user_id' => $userId,
            'status' => $transactionData['status'] ?? 'pending',
            'payment_status' => $transactionData['payment_status'] ?? 'unpaid',
            'payment_method' => $paymentMethod,
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
}
