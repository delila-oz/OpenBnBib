<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    public function showAll(Request $request)
    {
        $users = Profile::with('user')->paginate(5);
        $search = "Zeige alle Profile";
        $totalResults = User::count();
        return view('search', [
            'users'=>$users,
            'search'=>$search,
            'totalResults'=>$totalResults
        ]);
    }

    public function search(Request $request) {
        // Eloquent -->This will ensure that the items returned in the paginator are instances of your Product Eloquent model, with the category
        // relationship eager loaded (I.e. it will load the category relationship for each Product returned using one query, rather than 5 queries,
        // one for every Product).
        if( $request->plz){
            $search = $request->get('plz');
            $users = Profile::with('user')
                ->where('plz', 'like', $search.'%');
        }
        elseif( $request->profile_description){
            $search = $request->get('profile_description');
            $users = Profile::with('user')
                ->where('profile_description', 'ilike', '%'.$search.'%');
        }
        $request->validate([
            'query'=>'required|min:2'
        ]);
        $search = $request->input('query');
        $users = Profile::with('user')
            ->where('profile_description', 'ilike', '%'.$search.'%')
            ->paginate(5);
        $totalResults = User::count();
        return view('search',[
            'users'=>$users,
            'search'=>$search,
            'totalResults'=>$totalResults
        ]);
    }
}
