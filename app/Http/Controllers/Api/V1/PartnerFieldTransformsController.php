<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PartnerFieldTransform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerFieldTransformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PartnerFieldTransform::select('partner_id_left')->get()->jsonSerialize());
    }

    public function find(Request $request){
        $left_id = $request->partner_id_left;
        $right_id = $request->partner_id_right;
        if (isset($request->page)) {
            return response(PartnerFieldTransform::where('partner_id_left',$left_id)->where('partner_id_right',$right_id)->select('id', 'partnerfield_name_left', 'partnerfield_name_right')->paginate(12)->jsonSerialize());
        } else {
            return response(PartnerFieldTransform::where('partner_id_left',$left_id)->where('partner_id_right',$right_id)->select('id', 'partnerfield_name_left', 'partnerfield_id_left', 'partnerfield_name_right', 'partnerfield_id_right')->get()->jsonSerialize());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPair = PartnerFieldTransform::create($request->all());
        return $newPair;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $left_right = PartnerFieldTransform::findOrFail($id);
        // $left_right->partnerfield_id_left = $request->partnerfield_id_left
        // $left_right->partnerfield_id_right = $request->partnerfield_id_right
        // $left_right->partnerfield_name_left = $request->partnerfield_name_left
        // $left_right->partnerfield_name_right = $request->partnerfield_name_right
        // $left_right->save();

        $left_right->update($request->all());
        return $left_right;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $left_right = PartnerFieldTransform::findOrFail($id);
        $left_right->delete();
    }
}
