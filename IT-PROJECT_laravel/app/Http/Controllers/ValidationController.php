<?php

namespace App\Http\Controllers;

use App\Helpers\FormManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    /**
     * Validate a single field in real-time via AJAX.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateField(Request $request)
    {
        $fieldName = $request->input('field');
        $fieldValue = $request->input('value');
        $formType = $request->input('form_type');

        if (!$fieldName || !$formType) {
            return response()->json([
                'valid' => false,
                'message' => 'Missing field name or form type.'
            ], 400);
        }

        try {
            // Get validation rules for the form
            $allRules = FormManager::getValidationRules($formType);

            // Check if field has rules defined
            if (!isset($allRules['rules'][$fieldName])) {
                return response()->json([
                    'valid' => true,
                    'message' => null
                ]);
            }

            $fieldRules = $allRules['rules'][$fieldName];
            $customMessages = $allRules['messages'] ?? [];
            $customAttributes = $allRules['attributes'] ?? [];

            // Create validator for single field
            $validator = Validator::make(
                [$fieldName => $fieldValue],
                [$fieldName => $fieldRules],
                $customMessages,
                $customAttributes
            );

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'valid' => false,
                    'message' => $errors->first($fieldName)
                ]);
            }

            return response()->json([
                'valid' => true,
                'message' => null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'valid' => false,
                'message' => 'Validation error occurred.'
            ], 500);
        }
    }

    /**
     * Validate multiple fields at once via AJAX.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateFields(Request $request)
    {
        $fields = $request->input('fields', []);
        $formType = $request->input('form_type');

        if (empty($fields) || !$formType) {
            return response()->json([
                'valid' => false,
                'errors' => ['general' => 'Missing fields or form type.']
            ], 400);
        }

        try {
            $allRules = FormManager::getValidationRules($formType);

            // Filter rules to only include requested fields
            $fieldRules = [];
            foreach ($fields as $fieldName => $fieldValue) {
                if (isset($allRules['rules'][$fieldName])) {
                    $fieldRules[$fieldName] = $allRules['rules'][$fieldName];
                }
            }

            $customMessages = $allRules['messages'] ?? [];
            $customAttributes = $allRules['attributes'] ?? [];

            $validator = Validator::make(
                $fields,
                $fieldRules,
                $customMessages,
                $customAttributes
            );

            if ($validator->fails()) {
                $errors = [];
                foreach ($validator->errors()->toArray() as $field => $messages) {
                    $errors[$field] = $messages[0]; // Get first error message per field
                }

                return response()->json([
                    'valid' => false,
                    'errors' => $errors
                ]);
            }

            return response()->json([
                'valid' => true,
                'errors' => []
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'valid' => false,
                'errors' => ['general' => 'Validation error occurred.']
            ], 500);
        }
    }

    /**
     * Get client-side validation rules for a form type.
     * Returns a simplified version of rules for JavaScript validation.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClientRules(Request $request)
    {
        $formType = $request->input('form_type');

        if (!$formType) {
            return response()->json([
                'success' => false,
                'message' => 'Form type is required.'
            ], 400);
        }

        try {
            $allRules = FormManager::getValidationRules($formType);

            // Convert Laravel rules to client-friendly format
            $clientRules = $this->convertToClientRules($allRules['rules']);
            $customMessages = $allRules['messages'] ?? [];

            return response()->json([
                'success' => true,
                'rules' => $clientRules,
                'messages' => $customMessages
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not load validation rules.'
            ], 500);
        }
    }

    /**
     * Convert Laravel validation rules to client-side friendly format.
     *
     * @param array $rules
     * @return array
     */
    private function convertToClientRules(array $rules): array
    {
        $clientRules = [];

        foreach ($rules as $field => $fieldRules) {
            $clientRules[$field] = [];

            foreach ($fieldRules as $rule) {
                if (is_string($rule)) {
                    // Parse rule string (e.g., 'min:2', 'regex:/pattern/')
                    if (strpos($rule, ':') !== false) {
                        [$ruleName, $ruleValue] = explode(':', $rule, 2);
                    } else {
                        $ruleName = $rule;
                        $ruleValue = null;
                    }

                    switch ($ruleName) {
                        case 'required':
                            $clientRules[$field]['required'] = true;
                            break;
                        case 'min':
                            $clientRules[$field]['minLength'] = (int) $ruleValue;
                            break;
                        case 'max':
                            $clientRules[$field]['maxLength'] = (int) $ruleValue;
                            break;
                        case 'email':
                            $clientRules[$field]['email'] = true;
                            break;
                        case 'numeric':
                            $clientRules[$field]['numeric'] = true;
                            break;
                        case 'integer':
                            $clientRules[$field]['integer'] = true;
                            break;
                        case 'alpha':
                            $clientRules[$field]['alpha'] = true;
                            break;
                        case 'alpha_spaces':
                            $clientRules[$field]['alphaSpaces'] = true;
                            break;
                        case 'regex':
                            $clientRules[$field]['pattern'] = $ruleValue;
                            break;
                        case 'digits':
                            $clientRules[$field]['digits'] = (int) $ruleValue;
                            break;
                        case 'digits_only':
                            $clientRules[$field]['digitsOnly'] = true;
                            break;
                    }
                }
            }
        }

        return $clientRules;
    }
}
