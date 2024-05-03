<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class StoretransaksiRequest extends FormRequest
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
            'total' => 'nullable',
            'orderedList' => 'nullable|array'
        ];
    }

    // public function messages()
    // {
    //         return[
    //             'tanggal.required'=> "Data tanggal belum diisi",
    //             'total_harga.required'=> "Data total_harga belum diisi",
    //             'metode_pembayaran'.'required' => "Data metode_pembayaran belum diisi",
    //             'keterangan','required' => "Data keterangan belum diisi",
    //         ];
    // }

    public function failedException(Validator $validator) {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()]));
    }
}
