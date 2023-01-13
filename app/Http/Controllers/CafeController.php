<?php

namespace App\Http\Controllers;

use App\Models\Cafe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CafeController extends Controller
{

    private $DEFAULT_ROUTE_NAME = "cafe-index";

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
            "id",
            "cafe_name",
            "location",
            "distance",
            "rating",
        ]);
        $data_tables = DataTables::of($cafes)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return '<a href="'.route("cafe-edit", ["id" => $row->id]).'">Edit</a> | <a href="'.route("review.show", ["id" => $row->id]).'">Review</a>';
            })
            ->editColumn('distance', function($cafe) {
                return $cafe->distance.' km';
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
        return view("cafe.create", [
            "cafe" => new Cafe()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            "cafe_name" => ['required', 'string', 'max:100'],
            "location" => ['required', 'string', 'max:100'],
            "gmaps_link" => ['required', 'url'],
            "distance" => ['required', 'numeric'],
            "image" => ['required', 'mimes:jpg,jpeg,png,bmp,webp,gif'],
            "is_open_24h" => ['required'],
            "description" => ['required'],
        ]);

        // Store the image and get the path
        $img_path = Storage::put('images/', $req->image);

        Cafe::create([
            "cafe_name" => $req->cafe_name,
            "location" => $req->location,
            "gmaps_link" => $req->gmaps_link,
            "distance" => $req->distance,
            "is_open_24h" => $req->is_open_24h,
            "rating" => 0,
            "image" => $img_path,
            "description" => $req->description,
        ]);

        return redirect()->route($this->DEFAULT_ROUTE_NAME);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cafe = Cafe::find($id);
        return view("cafe.create", [
            "cafe" => $cafe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $cafe = Cafe::find($id);

        // Store the image and get the path
        $img_path = Storage::put('images', $req->image);

        $cafe->cafe_name = $req->cafe_name;
        $cafe->location = $req->location;
        $cafe->gmaps_link = $req->gmaps_link;
        $cafe->distance = $req->distance;
        $cafe->is_open_24h = $req->is_open_24h;
        $cafe->image = $img_path;
        $cafe->description = $req->description;

        $cafe->save();

        return redirect()->route($this->DEFAULT_ROUTE_NAME);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cafe::find($id)->delete();

        return redirect()->route($this->DEFAULT_ROUTE_NAME);
    }
}
