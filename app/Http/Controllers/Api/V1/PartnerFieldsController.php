<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PartnerField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PartnerField::all()->jsonSerialize());
    }

    public function find(Request $request) {
        $partner_id = $request->partner_id;
        if(isset($request->page)) {
            return response(PartnerField::where('partner_id',$partner_id)->paginate(12)->jsonSerialize());
        } else {
            return response(PartnerField::where('partner_id',$partner_id)->get()->jsonSerialize());
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
        $newPartnerField = PartnerField::create($request->all());
        return $newPartnerField;
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
        $partnerfield = PartnerField::findOrFail($id);
        $partnerfield->update($request->all());
        return $partnerfield;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partnerfield = PartnerField::findOrFail($id);
        $partnerfield->delete();
    }
}
