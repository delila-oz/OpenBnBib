<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($query)
    {
        //$query = User::findOrFail($query);  //das gleiche macht der Parameter in der edit Funktion
        //username statt ID nutzen
        $query = User::whereUsername($query)->firstOrFail();
        return view('profiles.index', [
            'user' => $query,
        ]);
        //knapper: return view('profiles.index', compact('user'));
    }

    public function edit(User $query)
    {
        $this->authorize('update', $query->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $query)
    {
        $this->authorize('update', $query->profile);
        $data = request()->validate([
            'profile_title' => '',
            'profile_description' => '',
            'plz' => '',
            'latitude' => '',
            'longitude' => '',
            'image' => '',
            'is_host' => '',
            'length_of_stay' => '',
            'offer_as_host' => '',
            'accommodation_description' => '',
            'accommodation_type' => '',
            'own_room' => '',
            'pets' => '',
            'accessibility' => '',
            'number_of_persons' => '',
            'professional_offer' => '',
            'is_smoker' => '',
            'professional_description' => ''
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(220, 220);
            $image->save();
            // statt in array_marge() direkt das Array zu übergeben (was zu Problemen führt, wenn man kein
            //Bild hochlädt), hierher auslagern
            $imageArray = ['image' => $imagePath];
        }

        if (request('offer_as_host')) {
            $offer_as_host = request('offer_as_host');
//            dd($offer_as_host);
        }

        //nur der angemeldete User darf ändern
        //array_merge()
        auth()->user()->profile->update(array_merge(
            $data,
            // kein Bild? leeres Array
            $imageArray ?? []
        ));

        //return redirect()->route('profile.show');
        return redirect("/profile/{$query->username}");
    }

    public function search(Request $request, User $user)
    {
//        https://m.dotdev.co/writing-advanced-eloquent-search-query-filters-de8b6c2598db
        $user = Profile::with('user');
        $query = $user->newQuery();
        $search = "Zeige alle Profile";

        if ($request->has('plz')) {
            $search = 'PLZ: '.$request->get('plz');
            $query->where('plz', 'like', $request->input('plz').'%');
            //mit get() habe ich eine Collection, auf der paginate nicht geht.
            // Method Illuminate\Database\Eloquent\Collection::paginate does not exist.
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
