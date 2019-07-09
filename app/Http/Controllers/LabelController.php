<?php

namespace App\Http\Controllers;

use App\Label;
use App\Http\Resources\LabelCollection as LabelCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $labelData = new LabelCollection(Label::all());

        $arrayData = [
          'status' => 'success',
          'data' => $labelData,
          'code' => '200'
        ];

        return json_encode($arrayData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('label.form');
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
        $label = new Label();
        $label->Name = $request->Name;
        $label->Slug = $request->Slug;
        $label->Path = $request->Path;
        $label->TextColour = $request->TextColour;
        $label->BGColour = $request->BGColour;
        $label->save();

        return response()->json('
        {"status":"success",
        "data":'.$label.'
        ,"code":"200"}
        ');

    }

    /**
     * Display the specified resource.po
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
