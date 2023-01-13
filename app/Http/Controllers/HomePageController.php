<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Review;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        return view("home");
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
}
