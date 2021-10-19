<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    public function search(Request $request)
    {
//      https://m.dotdev.co/writing-advanced-eloquent-search-query-filters-de8b6c2598db
        $user = Profile::with('user');
        $query = $user->newQuery();
        $search = "Zeige alle Profile";

        if ($request->has('plz')) {
            $search = 'PLZ: '.$request->get('plz');
            $query->where('plz', 'like', $request->input('plz').'%');
        }

        if ($request->has('profile_description')) {
            $search = $search . ', Profilbeschreibung: '.$request->get('profile_description');
            $query->where('profile_description', 'ilike', '%'.$request->input('profile_description').'%');
        }

        $users = $query->orderBy('plz')->paginate(5);

        $totalResults = User::count();
        return view('search', [
            'user'=>$users,
            'search'=>$search,
            'totalResults'=>$totalResults
        ]);
    }
}
