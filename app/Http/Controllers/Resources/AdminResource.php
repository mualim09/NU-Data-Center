<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
