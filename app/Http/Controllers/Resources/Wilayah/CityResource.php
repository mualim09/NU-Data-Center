<?php

namespace App\Http\Controllers\Resources\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Wilayah\City;
use Illuminate\Http\Request;

class CityResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataCity = City::orderBy('city_name');

        $data['params'] = [];

        if ($request->has('city_name')) {
            $data['params']['city_name'] = $request->city_name;
            $dataCity->where('city_name', 'LIKE', '%' . $request->city_name . '%');
        }

        if ($request->has('prov_id')) {
            $data['params']['prov_id'] = $request->prov_id;
            $dataCity->where('prov_id', 'LIKE', '%' . $request->prov_id . '%');
        }

        $limit = 50;
        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $data['data'] = $dataCity->paginate($limit);

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
     * @param  \App\Models\Wilayah\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        #
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
