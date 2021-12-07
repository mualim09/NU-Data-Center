<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Wilayah\City;
use App\Models\Wilayah\District;
use App\Models\Wilayah\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Admin::orderBy('nama_lengkap', 'asc');
        $filter = [];
        if ($request->has('pencarian') && $request->has('berdasarkan')) {
            $filter['Username'] = $request->pencarian;
            $data->where($request->berdasarkan, 'LIKE', '%' . $request->pencarian . '%');
        }
        if ($request->has('kabupaten')) {
            $filter['Kabupaten'] = $request->kabupaten;
            $data->where('kabupaten', 'LIKE', '%' . $request->kabupaten . '%');
        }
        if ($request->has('kecamatan')) {
            $filter['Kecamatan'] = $request->kecamatan;
            $data->where('kecamatan', 'LIKE', '%' . $request->kecamatan . '%');
        }
        if ($request->has('kelurahan')) {
            $filter['Kelurahan'] = $request->kelurahan;
            $data->where('kelurahan', 'LIKE', '%' . $request->kelurahan . '%');
        }
        $limit = 50;
        if ($request->has('limit')) {
            $limit = $request->limit;
        }
        $viewData['data'] = $data->paginate($limit);
        $viewData['filter'] = $filter;
        return response()->json([
            'content' => ($request->has('view_content'))
                ? view($request->view_content, $viewData)->render()
                : '',
            'pagination' => ($request->has('view_pagination'))
                ? view($request->view_pagination, $viewData)->render()
                : '',
            'filter' => ($request->has('view_filter'))
                ? view($request->view_filter, $viewData)->render()
                : '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $pathAvatar = 'images/img-unavailable.png';
        if ($request->hasFile('avatar')) {
            $pathAvatar = 'storage/' . $request->file('avatar')->store('admin/avatar');
        }
        $data = Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'avatar' => $pathAvatar,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nomor_hp' => $request->nomor_hp,
            'nomor_ktp' => $request->nomor_ktp,
            'admin_username' => Auth::user()->username,
        ]);
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admin['avatar_link'] = asset($admin->avatar);
        $city = City::where('city_name', $admin->kabupaten)
            ->where('prov_id', 15)
            ->first();
        $district = District::where('dis_name', $admin->kecamatan);
        $subDistrict = SubDistrict::where('subdis_name', $admin->kelurahan);

        if ($city != null) {
            $district->where('city_id', $city->city_id);
        }
        $district = $district->first();

        if ($district != null) {
            $subDistrict->where('dis_id', $district->dis_id);
        }
        $subDistrict = $subDistrict->first();

        $admin['city_id'] = ($city != '') ? $city->city_id : -1;
        $admin['dis_id'] = ($district != '') ? $district->dis_id : -1;
        $admin['subdis_id'] = ($subDistrict != '') ? $subDistrict->subdis_id : -1;

        return response()->json($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validatedData = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nomor_hp' => $request->nomor_hp,
            'nomor_ktp' => $request->nomor_ktp,
            'admin_username' => Auth::user()->username
        ];

        if ($request->hasFile('avatar')) {
            if ($admin->avatar != 'images/user-default.png') {
                if (file_exists(public_path() . '/' . $admin->avatar)) {
                    Storage::delete('admin/avatar/' . basename($admin->avatar));
                }
            }
            $pathFotoDiri = 'storage/' . $request->file('avatar')->store('admin/avatar');
            $validatedData['avatar'] = $pathFotoDiri;
        }

        $admin->update($validatedData);
        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if ($admin->avatar != 'images/user-default.png') {
            if (file_exists(public_path() . '/' . $admin->avatar)) {
                Storage::delete('admin/avatar/' . basename($admin->avatar));
            }
        }
        $admin->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
