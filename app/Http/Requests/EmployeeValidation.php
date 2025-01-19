<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'nik' => 'required|numeric|min:16',
            'nohp' => 'required|numeric|min:11',
            'alamat' => 'required|string',
            'type_kontrak' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        throw new HttpResponseException(response()->json(
            [
                'status' => 'error',
                'message' => $message,
                'statusCode' => 422,
            ], 
            422
        ));
    }
}
