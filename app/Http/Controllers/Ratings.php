<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;

class Ratings extends Controller
{


    //homepage all-ratings 
    public function index()
    {
        //$people_ratings=rating::all();
        $people_ratings = rating::where('id', '!=', auth()->id())->get();

        #create array name->mo rating
        $ratingslist = array();
        foreach ($people_ratings as $rating) {

            $ratingssum = ($rating->onestar + $rating->twostars +
                $rating->threestars + $rating->fourstars +
                $rating->fivestars);
            if ($ratingssum > 0) {
                $avarage = intdiv(($rating->onestar * 1 + $rating->twostars * 2 +
                        $rating->threestars * 3 + $rating->fourstars * 4 +
                        $rating->fivestars * 5),
                    $ratingssum
                );
            } else {
                $avarage = 0;
            }


            array_push($ratingslist, [$rating->username, $avarage, $rating->id]);
        }



        return view("ratingslist", ["ratingslist" => $ratingslist]);
    }



    public function userprofile(rating $userrating)
    {

        $username = $userrating->username;

        $onestar = $userrating->onestar;
        $twostars = $userrating->twostars;
        $threestars = $userrating->threestars;
        $fourstars = $userrating->fourstars;
        $fivestars = $userrating->fivestars;

        $ratingssum = $onestar + $twostars + $threestars + $fourstars + $fivestars;

        if ($ratingssum > 0) {
            $avarage = intdiv(($userrating->onestar * 1 + $userrating->twostars * 2 +
                    $userrating->threestars * 3 + $userrating->fourstars * 4 +
                    $userrating->fivestars * 5),
                $ratingssum
            );
        } else {
            $avarage = 0;
        }

        $user_stats = [$username, $onestar, $twostars, $threestars, $fourstars, $fivestars, $ratingssum, $avarage];


        return view("userprofile", ["user_stats" => $user_stats]);
    }



    public function rateuser(Request $request, rating $userrating)
    {

        $name = $userrating->username;

        $ratingssum = ($userrating->onestar + $userrating->twostars +
            $userrating->threestars + $userrating->fourstars +
            $userrating->fivestars);
        if ($ratingssum > 0) {
            $avarage = intdiv(($userrating->onestar * 1 + $userrating->twostars * 2 +
                    $userrating->threestars * 3 + $userrating->fourstars * 4 +
                    $userrating->fivestars * 5),
                $ratingssum
            );
        } else {
            $avarage = 0;
        }
        $userdata = [$name, $avarage];

        if ($request->method() == "POST") {
            $newrating = $request->get("rating");

            if ($newrating == 1) {
                $userrating->onestar++;
            } elseif ($newrating == 2) {
                $userrating->twostars++;
            } elseif ($newrating == 3) {
                $userrating->threestars++;
            } elseif ($newrating == 4) {
                $userrating->fourstars++;
            } elseif ($newrating == 5) {
                $userrating->fivestars++;
            }
            if ($userrating->save()) {
                echo "Rating saved succesfully!";
            }
            return redirect("/mainpage");
        };

        return view('newrating', ['userdata' => $userdata]);
    }

    public function search(Request $request)
    {
        $q = $request->get("q", " there are not results");

        if (!$request->filled("q")) {
            $q = " there are not results";
            return view('noresults', ["q" => $q]);
        } else {
            $queryresults = rating::where("username", "like", "%" . $q . "%")->get();

            $ratingslist = array();
            foreach ($queryresults as $rating) {

                $avarage = intdiv(($rating->onestar * 1 + $rating->twostars * 2 +
                        $rating->threestars * 3 + $rating->fourstars * 4 +
                        $rating->fivestars * 5),
                    ($rating->onestar + $rating->twostars +
                        $rating->threestars + $rating->fourstars +
                        $rating->fivestars)
                );

                array_push($ratingslist, [$rating->username, $avarage, $rating->id]);
            }
            if (empty($ratingslist)) {
                return view('noresults', ["q" => $q]);
            }
        }
        return view('searchresults', ["ratingslist" => $ratingslist], ["q" => $q]);
    }
}
