<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Size::all();
    }

    public function sizeslist(Request $request)
    {
        $nr = $request->get('nr');
        //$col = $request->get('col');
        if ($request->get('col') == null) {
            $col = "number";
        } else {
            $col = $request->get('col');
        } ;
        if ($request->get('order') == null) {
            $order = "asc";
        } else {
            $order = $request->get('order');
        } ;
        $search = $request->get('search');

        $data = Size::orderBy($col, $order)
            ->where('number', 'like', '%' .$search . '%')
            ->paginate($nr);
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
            'number' => 'required'
        ]);

        return Size::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Size::find($id);
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
        $size = Size::find($id);
        $size->update($request->all());
        return $size;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        Size::destroy($id);
        return $size;
    }
}
