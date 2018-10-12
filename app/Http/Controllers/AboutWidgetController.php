<?php

namespace App\Http\Controllers;

use App\Models\AboutWidget;
use Illuminate\Http\Request;

class AboutWidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function show(AboutWidget $aboutWidget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutWidget $aboutWidget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutWidget $aboutWidget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutWidget $aboutWidget)
    {
        //
    }

    public function aboutWidgets(AboutWidget $aboutWidget)
    {
        $aboutWidget = AboutWidget::all();
        return $this->respondData($aboutWidget);
    }
}
