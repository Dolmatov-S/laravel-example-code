<?php

namespace App\Http\Requests\Filter;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class QueryFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'developer_id' => 'nullable|exists:developers,id',
            'site_id' => 'nullable|exists:sites,id',
            'framework_id' => 'nullable|exists:frameworks,id',
        ];
    }


    /**
     *
     * @return void
     */
    public function prepareForValidation(): void
    {
        foreach ($this->all() as $key => $value) {
            $this[$key] = $this->valueToFormat($value);
        }
    }

    /**
     * @param $value
     * @return array|int|string|string[]
     */
    protected function valueToFormat(mixed $value): array|int|string
    {
        if (is_array($value) || is_int($value)) {
            return $value;
        }

        if (is_string($value)) {
            $value = str_replace(["[", "]"], '', $value);

            if (mb_strpos($value, ',', 0, 'UTF-8')) {
                return explode(',', $value);
            }
        }

        return $value;
    }

    protected function failedValidation(Validator $validator)
    {
        if (App::isProduction()) {
            abort(404);
        }
        dd($validator->getMessageBag());

    }
}
