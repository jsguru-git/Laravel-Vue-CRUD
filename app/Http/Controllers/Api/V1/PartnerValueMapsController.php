<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PartnerValueMaps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerValueMapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->page)) {
            return response(PartnerValueMaps::paginate(12)->jsonSerialize());
        } else {
            return response(PartnerValueMaps::all()->jsonSerialize());
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
        $this->validate($request, [
            'valuemap' => 'required'
        ]);
        $newPartnerValueMaps = PartnerValueMaps::create($request->all());
        return $newPartnerValueMaps;
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
        $this->validate($request, [
            'valuemap' => 'required'
        ]);
        $partnerValueMap = PartnerValueMaps::findOrFail($id);
        $partnerValueMap->update($request->all());
        return $partnerValueMap;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partnerValueMap = PartnerValueMaps::findOrFail($id);
        $partnerValueMap->delete();
    }
}
