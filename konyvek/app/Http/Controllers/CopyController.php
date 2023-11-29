<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $copys = response()->json(Copy::all());
        return $copys;
    }

    public function show($id){
        $copy = response()->json(Copy::find($id));
        return $copy;
    }

    public function store(Request $request){
        $copy = new Copy();
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->publication = $request->publication;
        $copy->status = $request->status;
        $copy->save();
    }

    public function update(Request $request, $id){
        $copy = Copy::find($id);
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->publication = $request->publication;
        $copy->status = $request->status;
        $copy->save();
    }
    public function destroy(Copy $copy)
    {
        //find helyett a paraméter
        $copy->delete();
    }
}
