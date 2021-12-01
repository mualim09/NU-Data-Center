<?php

namespace App\Http\Controllers\Resources\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Wilayah\District;
use Illuminate\Http\Request;

class DistrictResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataDistrict = District::orderBy('dis_name');

        $data['params'] = [];


        if ($request->has('city_id')) {
            $data['params']['city_id'] = $request->city_id;
            $dataDistrict->where('city_id', $request->city_id);
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
     * @param  \App\Models\Wilayah\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
