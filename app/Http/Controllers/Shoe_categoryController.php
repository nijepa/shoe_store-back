<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shoe_category;

class Shoe_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shoe_category::all();
    }

    public function categorieslist(Request $request)
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

        $data = Shoe_category::orderBy($col, $order)
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

        return Shoe_category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shoe_category::find($id);
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
        $category = Shoe_category::find($id);
        $category->update($request->all());
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Shoe_category::find($id);
        Shoe_category::destroy($id);
        return $category;
    }
}
