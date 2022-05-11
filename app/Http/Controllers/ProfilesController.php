<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user)
    {
        //username statt ID nutzen
        $user = User::whereUsername($user)->firstOrFail();
        return view('profiles.index', compact('user'));
    }

    public function edit($user)
    {
        $user = User::whereUsername($user)->firstOrFail();
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update($user)
    {
        $user = User::whereUsername($user)->firstOrFail();
        $this->authorize('update', $user->profile);
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

//        if (request('offer_as_host')) {
//            $offer_as_host = request('offer_as_host');
//        }

        //nur der angemeldete User darf ändern
        auth()->user()->profile->update(array_merge(
            $data,
            // kein Bild? leeres Array
            $imageArray ?? []
        ));
        //dd($user->profile);
        return redirect("/profile/{$user->username}");
    }
}
