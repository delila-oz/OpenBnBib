<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    //disabling mass assignment protection
    protected $guarded = [];

    public function profileImage()
    {
        //default Bild anzeigen, wenn kein eigenes vorhanden
        $imagePath = ($this->image) ? $this->image : 'profile/4difJwL2kFCEyHR7EEGE3ddKVtYDXOZryV3n26wO.jpeg';
        return '/storage/' . $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
