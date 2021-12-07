<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:admin,username',
            'password' => 'required|confirmed',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nomor_hp' => 'required',
            'nomor_ktp' => 'required',
            'avatar' => 'image|max:6128'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus di isi',
            'max' => ':attribute maksimal tidak lebih dari :max KB',
            'confirmed' => 'Konfirmasi :attribute tidak cocok'
        ];
    }
}
