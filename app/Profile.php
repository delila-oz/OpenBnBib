<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    //disabling mass assignment protection
    /**
     * @var mixed
     */
    protected $guarded = [];

    //TODO macht, dass jeder Array Eintrag einzeln statt [a, b, c] angezeigt wird; castet das Array in JSON wie im Model beschrieben
    protected $casts = [
      'offer_as_host' => 'array'
    ];

    public function profileImage()
    {
        //default Bild anzeigen, wenn kein eigenes vorhanden
        $imagePath = ($this->image) ? $this->image : 'profile/wNidQN6KgaJBymgtx21tVXBRTiGh19cNi3R22C8D.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

}
