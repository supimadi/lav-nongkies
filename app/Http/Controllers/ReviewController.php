<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ReviewController extends Controller
{

    public function searchUser(Request $req, int $id = 0)
    {
        if(!$req->ajax()) {
            return response([
                "success" => false,
                "messages" => "Just accept ajax request."
            ], 403);
        }

        $user = User::where("name", "like", '%'.$req->q.'%')
            ->where("is_admin", "=", "0")
            ->get();

        $users = array();
        foreach($user as $u) {
            array_push($users, [
                "id" => $u->id,
                "text" => $u->name,
                "selected" => $u->id == $id,
            ]);
        }

        return response([
            "results" => $users
        ]);
    }

    public function searchCafe(Request $req, int $id = 0)
    {
        if(!$req->ajax()) {
            return response([
                "success" => false,
                "messages" => "Just accept ajax request."
            ], 403);
        }

        $cafe = Cafe::where("cafe_name", "like", '%'.$req->q.'%')->get();

        $cafes = array();
        foreach($cafe as $u) {
            array_push($cafes, [
                "id" => $u->id,
                "text" => $u->cafe_name,
                "selected" => $u->id == $id,
            ]);
        }

        return response([
            "results" => $cafes
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("reviews.create", [
            "review" => new Review()
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
            "user" => ["required", "numeric"],
            "cafe_name" => ["required", "numeric"],
            "review" => ["required"],
            "rating" => ["required", "numeric", "min:0", "max:5"],
        ]);

        Review::create([
            "reviewer_id" => $req->user,
            "cafe_id" => $req->cafe_name,
            "review" => $req->review,
            "rating" => (double) $req->rating,
        ]);

        return redirect()->route("review.show", [
            "id" => $req->cafe_name
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {
        if(!$req->ajax()) {
            return view("reviews.show", [
                "cafe" => Cafe::find($id),
            ]);
        }

        $review = DB::table('cafes as c')
            ->select(
                'r.id as id',
                'r.review as review',
                'u.name as name',
                'r.rating as rating',
            )
            ->join("reviews as r", "r.cafe_id", "=", "c.id")
            ->join("users as u", "r.reviewer_id", "=", "u.id")
            ->where("c.id", "=", $id)
            ->get();

        $dataTable = DataTables::of($review)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return '<a href="'.route("review.edit", ["id" => $row->id]).'">Edit</a> | <a class="text-red-800" href="'.route("review.destroy", ["id" => $row->id]).'">Remove</a>';
            })
            ->editColumn('review', function($review) {
                return Str::limit($review->review, 20);

            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTable;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view("reviews.create", [
            "review" => $review
        ]);
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
        Review::find($id)->delete();

        return redirect()->route("cafe-index");
    }
}
