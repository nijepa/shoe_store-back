<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shoe_brand;

class Shoe_brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shoe_brand::all();
    }

    public function brandslist(Request $request)
    {
        $nr = $request->get('nr');
        //$col = $request->get('col');
        if ($request->get('col') == null) {
            $col = "name";
        } else {
            $col = $request->get('col');
        } ;
        if ($request->get('order') == null) {
            $order = "asc";
        } else {
            $order = $request->get('order');
        } ;
        $search = $request->get('search');

        $data = Shoe_brand::orderBy($col, $order)
            ->where('name', 'like', '%' .$search . '%')
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
            'name' => 'required'
        ]);

        return Shoe_brand::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shoe_brand::find($id);
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
        $brand = Shoe_brand::find($id);
        $brand->update($request->all());
        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Shoe_brand::find($id);
        Shoe_brand::destroy($id);
        return $brand;
    }
}
