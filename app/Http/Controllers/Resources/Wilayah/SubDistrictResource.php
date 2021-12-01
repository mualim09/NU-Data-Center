<?php

namespace App\Http\Controllers\Resources\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Wilayah\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataDistrict = SubDistrict::orderBy('subdis_name');

        $data['params'] = [];


        if ($request->has('dis_id')) {
            $data['params']['dis_id'] = $request->dis_id;
            $dataDistrict->where('dis_id', $request->dis_id);
        }

        $limit = 50;
        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $data['data'] = $dataDistrict->paginate($limit);

        if ($request->missing('view_json')) {
            return response()->json([
                'content' => view($request->view_content, $data)->render(),
                'pagination' => view($request->view_pagination, $data)->render(),
                'filter' => ($request->has('view_filter')) ? view($request->view_filter, $data)->render() : ''
            ]);
        } else {
            $data['status'] = 'success';
            return response()->json($data);
        }
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
     * @param  \App\Models\Wilayah\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function show(SubDistrict $subDistrict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDistrict $subDistrict)
    {
        //
    }
}
