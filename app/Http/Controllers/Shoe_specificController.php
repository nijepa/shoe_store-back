<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shoe_specific;

class Shoe_specificController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Shoe_specific::all();
        $data = Shoe_specific::with(['shoe', 'color', 'size'])->paginate(6);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shoe_id' => 'required'
        ]);

        //return Shoe_specific::create($request->all());
        $newShoe = Shoe_specific::create($request->all());
        $id = $newShoe->only('id');
        return $newShoe::with(['shoe', 'color', 'size'])->where('id', $id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shoe_specific::with(['shoe', 'color', 'size'])->find($id);
    }

    public function shoespecs($id)
    {
        return Shoe_specific::where('shoe_id', $id)->get();
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
        $specific = Shoe_specific::find($id);
        $specific->update($request->all());
        return $specific;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return Shoe_specific::destroy($id);
        $specific = Shoe_specific::find($id);
        Shoe_specific::destroy($id);
        return $specific;
    }
}
