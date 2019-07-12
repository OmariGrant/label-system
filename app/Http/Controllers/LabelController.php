<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabel;
use App\Label;
use App\Http\Resources\LabelCollection as LabelCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class LabelController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $labelData = new LabelCollection(Label::all());


        if ($labelData->response()->getStatusCode() == 200)
        {
            return response()->json([
                'status' => 'success',
                'data' => $labelData,
                'code' => $labelData->response()->getStatusCode(),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'code' => $labelData->response()->getStatusCode(),
                'message' => $labelData,
            ]);
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
        return view('label.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabel $request)
    {
        //

        $validated = $request->validated();

        $label = new Label();
        $label->Name = $request->Name;
        $label->Slug = $request->Slug;
        $label->Path = $request->Path;
        $label->TextColour = $request->TextColour;
        $label->BGColour = $request->BGColour;
        $label->save();

        return response()->json([
            'status' => 'success',
            'data' => $label,
            'code' => 200,
        ]);

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


        return response()->json([
            'status' => 'success',
            'data' => [
                'current' => $label,
                'children' => $label->children->Path
            ],
            'code' => 200,
        ]);
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
        $data = [
            'isEdit' => 1,
            'Name' => $label->Name,
            'Slug' => $label->Slug,
            'Path' => $label->Path,
            'TextColour' => $label->TextColour,
            'BGColour' => $label->BGColour,
        ];

        return view('label.form', $data);

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
        $label->Name = $request->Name;
        $label->Slug = $request->Slug;
        $label->Path = $request->Path;
        $label->TextColour = $request->TextColour;
        $label->BGColour = $request->BGColour;
        $label->save();

        return response()->json([
            'status' => 'success',
            'data' => $label,
            'code' => 200,
        ]);
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
        $label->delete();

        return response()->json([
            'status' => 'success',
            'data' => $label,
            'code' => 200,
        ]);
    }
}
