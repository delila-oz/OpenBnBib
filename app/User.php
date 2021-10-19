<?php

namespace App;

//use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\Mail;
use Cmgmyr\Messenger\Traits\Messagable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Messagable; //https://github.com/cmgmyr/laravel-messenger
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //TODO: fürs Testen ausgesetzt
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        //ein Model Event, eine Closure, hier wird nach dem kreiieren des Users automatisch ein Profil kreiert
        static::created(function ($user) {
            $user->profile()->create([
                'profile_title' => 'Deine Kurzbeschreibung. Sie wird in der Ergebnisliste der Suche angezeigt.'
            ]);

            //E-Mail TODO: Mail erst nach der Verifizierung senden
            //Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

}
