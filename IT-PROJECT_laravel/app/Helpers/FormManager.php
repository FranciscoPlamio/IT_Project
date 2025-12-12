<?php

namespace App\Helpers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Support\Str;
use TypeError;

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
            } else if ($formData['application_type'] === "new" || $formData['application_type'] === "renewal") {
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
        } elseif ($formType === "form1-03") {
            $typeRaw = strtoupper($formData['certificate_type']); // e.g., "AT-RSL"
            $years = (int) ($formData['years'] ?? 1);
            $applicationType = $formData['application_type'] ?? 'new';

            // --- FEE TABLES ---
            $feeTableNewRenewal = [
                "ATROC-NEW" => ["ff" => 0, "cpf" => 0, "lf" => 0, "roc" => 60, "dst" => 30],
                "ATROC-RENEW-MOD" => ["ff" => 0, "cpf" => 0, "lf" => 0, "roc" => 60, "dst" => 30],
                "AT-LIFETIME-NEW" => ["ff" => 60, "cpf" => 0, "lf" => 50, "roc" => 0, "dst" => 30],
                "AT-CLUB-RSL-NEW" => ["ff" => 180, "cpf" => 600, "lf" => 700, "roc" => 0, "dst" => 30],
                "AT-CLUB-RSL-RENEW-MOD" => ["ff" => 180, "cpf" => 600, "lf" => 700, "roc" => 0, "dst" => 30],
                "TEMP-A" => ["ff" => 60, "cpf" => 0, "lf" => 120, "roc" => 60, "dst" => 30],
                "TEMP-B" => ["ff" => 60, "cpf" => 0, "lf" => 132, "roc" => 60, "dst" => 30],
                "TEMP-C" => ["ff" => 60, "cpf" => 0, "lf" => 144, "roc" => 60, "dst" => 30],
                "SPECIAL-EVENT-CALL" => ["sp" => 120, "dst" => 30],
                "VANITY-CALL" => ["sp" => 1000, "dst" => 30],
            ];

            $feeTableModification = [
                "ATROC-RENEW-MOD" => ["mod_ff" => 50, "mod_fee" => 0, "pos_fee" => 0, "dst" => 30],
                "ATRSL-RENEW-MOD" => ["mod_ff" => 60, "mod_fee" => 50, "pos_fee" => 50, "dst" => 30],
                "AT-LIFETIME-MODIFICATION" => ["mod_ff" => 60, "mod_fee" => 50, "pos_fee" => 50, "dst" => 30],
                "AT-CLUB-RSL-RENEW-MOD" => ["mod_ff" => 180, "mod_fee" => 50, "pos_fee" => 50, "dst" => 30],
            ];

            // --- DETERMINE FEE ROW ---
            if ($applicationType === 'modification') {
                // Direct lookup, ignore station class
                $row = $feeTableModification[$typeRaw] ?? null;
            } else {
                // NEW / RENEWAL processing
                if (Str::contains($typeRaw, 'ATRSL')) {
                    $stationClass = strtoupper($formData['station_class'] ?? 'A');
                    $rslTable = [
                        "RSL-CLASS_A" => ["ff" => 60, "cpf" => 0, "lf" => 120, "roc" => 60, "dst" => 30],
                        "RSL-CLASS_B" => ["ff" => 60, "cpf" => 0, "lf" => 132, "roc" => 60, "dst" => 30],
                        "RSL-CLASS_C" => ["ff" => 60, "cpf" => 0, "lf" => 144, "roc" => 60, "dst" => 30],
                        "RSL-CLASS_D" => ["ff" => 60, "cpf" => 0, "lf" => 144, "roc" => 60, "dst" => 30],
                    ];
                    $matchedKey = "RSL-" . $stationClass;
                    $row = $rslTable[$matchedKey] ?? $rslTable["RSL-CLASS_A"];
                } elseif (($formData['certificate_type'] ?? null) === "temporary-foreign") {
                    $rawClass = $formData['station_class'] ?? 'class_a';
                    $stationClass = strtoupper(substr($rawClass, strpos($rawClass, '_') + 1));
                    $matchedKey = "TEMP-" . $stationClass;
                    $row = $feeTableNewRenewal[$matchedKey] ?? $feeTableNewRenewal["TEMP-A"];
                } else {

                    $row = $feeTableNewRenewal[$typeRaw] ?? null;
                }
            }

            // --- CALCULATE FEE ---
            if ($row) {
                if ($applicationType === 'new') {
                    $ff = $row['ff'] ?? 0;
                    $cpf = $row['cpf'] ?? 0;
                    $lf_total = ($row['lf'] ?? 0) * $years;
                    $roc_total = ($row['roc'] ?? 0) * $years;
                    $dst = $row['dst'] ?? 0;
                    $sp = $row['sp'] ?? 0;
                    $total = $ff + $cpf + $lf_total + $roc_total + $dst + $sp;
                } elseif ($applicationType === 'renewal') {
                    $ff = 0;
                    $cpf = 0;
                    $lf_total = ($row['lf'] ?? 0) * $years;
                    $roc_total = ($row['roc'] ?? 0) * $years;
                    $dst = $row['dst'] ?? 0;
                    $sp = $row['sp'] ?? 0;
                    $total = $lf_total + $roc_total + $dst + $sp;
                } elseif ($applicationType === 'modification') {
                    $ff = $row['mod_ff'] ?? 0;
                    $mod_fee = $row['mod_fee'] ?? 0;
                    $pos_fee = $row['pos_fee'] ?? 0;
                    $dst = $row['dst'] ?? 0;
                    $total = $ff + $mod_fee + $pos_fee + $dst;
                }

                $transactionData['payment_amount'] = $total;
            }


            $form = $formModel::updateOrCreate(
                ['form_token' => $formToken],
                array_merge($formData, [
                    'certificate' => $typeRaw,
                    'station_class' => $formData['station_class'] ?? null,
                    'or' => null,
                ])
            );
        } elseif ($formType === "form1-09") {

            // Always amateur radio service (fixed)
            $radioService = strtolower($formData['radio_service'] ?? '');

            // Count any field that ends with "_units"
            $totalUnits = 0;

            foreach ($formData as $key => $value) {
                if (str_ends_with($key, '_units')) {
                    $totalUnits += (int) $value;
                }
            }

            // Fees for amateur service
            $feePerUnit = 50;
            $DST = 30;

            // Compute total
            $total = ($totalUnits * $feePerUnit) + $DST;

            // Add to transaction
            $transactionData['payment_amount'] = $total;
            foreach ($formData as $key => $value) {
                if (is_array($value)) {
                    dd("Form key '$key' contains an array", $value);
                }
            }

            // Save form data
            $form = $formModel::updateOrCreate(
                ['form_token' => $formToken],
                array_merge($formData, [
                    'or' => null
                ])
            );
        } else {
            // dd($formData, $transactionData);
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
