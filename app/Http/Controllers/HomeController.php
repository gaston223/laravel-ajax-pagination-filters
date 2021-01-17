<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::getUsers('', GlobalConstants::ALL, GlobalConstants::ALL, GlobalConstants::ALL);
        return view('home')->with('users', $users);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getMoreUsers(Request $request) {
        $query = $request->search_query;
        $country = $request->selected_country;
        $sort_by = $request->sort_by;
        $framework = $request->framework;

        if($request->ajax()) {
            $users = User::getUsers($query, $country, $sort_by, $framework);
            return view('pages.user_data', compact('users'))->render();
        }
    }
}
