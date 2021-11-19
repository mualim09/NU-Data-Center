<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' =>'required',
            'tanggal_lahir' => 'required|date',
            'no_ktp' => 'required',
            'no_kartanu' => 'required',
            'no_telepon' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
            'foto_diri' => 'image|max:6128',
            'scan_ktp' => 'image|max:6128',
            'scan_kartanu' => 'image|max:6128',
            'aktifitas_nu' => 'required',
            'jabatan_nu' => 'required',
        ];
    }

    /**
     * Overriding default message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'image' => ':attribute harus berupa gambar (jpg, jpeg, png, bmp, gif, svg, webp)',
            'max' => ':attribute harus tidak lebih dari :max Kb'
        ];
    }
}
