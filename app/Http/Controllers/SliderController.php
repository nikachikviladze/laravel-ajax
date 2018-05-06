<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($slider = Slider::where( 1)->get());
        $items = Slider::orderBy('ordering', 'asc')->get();
        return view('admin/slider/index', ['items'=>$items]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateSlider(request $request){
        $start = $request->start;
        $finish = $request->finish;
        return $request->order[0];

        for ($i=1; $i < count($request->order); $i++) { 
            $slider = Slider::find($i);
            $slider->order = $request->order[$i];
            $slider->save();
        }

        return  count($request->order);

        $slider = Slider::where('ordering', $start)->first();
        $slider->ordering = $finish;
        $slider->update();

        $slider2 = Slider::where('ordering', $finish)->get();
        $slider2[1]->ordering = $start;
        $slider2[1]->update();
        return $slider2[1];

    }
}
