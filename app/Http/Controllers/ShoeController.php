<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shoe;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Shoe::all();
        //$data = Shoe::paginate(6);
        $data = Shoe::orderBy('title', 'asc')
            ->paginate(6);
        return response()->json($data);
    }

    public function list1()
    {
        //$data = Shoe::with(['category', 'brand'])->paginate(6);
        $data = Shoe::with(['category', 'brand'])
        ->orderBy(
            'title', 'asc'
        )->paginate(6);
        return response()->json($data);
    }

    public function list(Request $request)
    {
        $nr = $request->get('nr');
        //$col = $request->get('col');
        if ($request->get('col') == null) {
            $col = "title";
        } else {
            $col = $request->get('col');
        } ;
        if ($request->get('order') == null) {
            $order = "asc";
        } else {
            $order = $request->get('order');
        } ;
        $search = $request->get('search');

        $data = Shoe::with(['category', 'brand'])
            ->orderBy($col, $order)
            ->where('title', 'like', '%' .$search . '%')
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
            'title' => 'required'
        ]);

        return Shoe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shoe::with(['category', 'brand'])->find($id);
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
        $shoe = Shoe::find($id);
        $shoe->update($request->all());
        return $shoe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return Shoe::destroy($id);
        $shoe = Shoe::find($id);
        Shoe::destroy($id);
        return $shoe;
    }
}
