<?php

namespace App\Http\Controllers;

use App\Models\Cafe;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        if(!$req->ajax()) {
            return view("cafe.index");
        }
        
        $cafes = Cafe::all([
            "cafe_name",
            "location",
            "distance",
            "rating",
        ]);
        $data_tables = DataTables::of($cafes)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger">Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data_tables;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cafe.create");
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
}
