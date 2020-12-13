<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($user)
    {
        $user = User::findOrFail($user);  //das gleiche macht der Paramter in der edit Funktion

        return view('profiles.index', [
            'user' => $user,
        ]);
        //knapper: return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'profile_title' => '',
            'profile_description'=> '',
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


        //dd($data); //zeigt das Array an

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(220,220);
            $image->save();
            // statt in array_marge() direkt das Array zu übergeben (was zu Problemen führt, wenn man kein
            //Bild hochlädt), hierher auslagern
            $imageArray = ['image' => $imagePath];

        }
        //nur der angemeldete User darf ändern
        //array_merge()

        auth()->user()->profile->update(array_merge(
            $data,
            // kein Bild? leeres Array
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
