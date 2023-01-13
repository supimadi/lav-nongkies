<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function home()
    {
        $cafe = Cafe::orderBy('rating', 'desc')->get();

        return view("home", [
            "cafe" => $cafe,
        ]);
    }

    public function searchCafe(Request $req)
    {
        if(!$req->ajax()) {
            return response([
                "success" => false,
                "messages" => "Just accept ajax request."
            ], 403);
        }


        if ($req->q == "") {
            $cafes = Cafe::all();
        } else {
            $cafes = Cafe::where("cafe_name", "like", '%'.$req->q.'%')->get();
        }

        return response([
            "success" => true,
            "data" => $cafes
        ]);

    }

    public function showCafe($cafe_id)
    {
        $cafe = Cafe::find($cafe_id);
        $review = Review::where("cafe_id", "=", $cafe->id)->get();

        return view("cafe.cafe", [
            "cafe" => $cafe,
            "review" => $review
        ]);
    }

    public function createReview($cafe_id)
    {
        $cafe =  Cafe::find($cafe_id);

        return view("reviews.user-create", [
            "cafe" => $cafe
        ]); 

    }

    public function storeReview(Request $req)
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

        return redirect()->route('home.show.review', [
            "cafe_id" => $req->cafe_name
        ]);
    }

    public function showReview($cafe_id) {
        $cafe = Cafe::find($cafe_id);
        $review = DB::table('reviews as r')
            ->select(
                'r.id as id',
                'u.name as name',
                'r.review as review',
                'r.rating as rating',
            )
            ->join('users as u', "r.reviewer_id", "=", "u.id")
            ->where("r.cafe_id", "=", $cafe_id)
            ->get();

        return view("reviews.detail", [
            "cafe" => $cafe,
            "review" => $review
        ]);
    }
}
