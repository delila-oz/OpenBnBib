<?php

namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Wenn nicht eingeloggt User auf /home zugreifen werden sie weitergeleitet
     *
     * @return void
     */
    public function test_redirect_if_not_logged_in()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }

    /**
     * Eingeloggt User können auf /home zugreifen
     *
     * @return void
     */
    public function test_logged_users_can_see_home()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/home');
        $response->assertStatus(200);
    }

    /**
     * Eingeloggt User können nur ihr eigenes Profil ändern
     *
     * @return void
     */
    public function test_edit_profile()
    {
        $user = User::find(1);
        $profile = User::find(2);
        $response = $this->actingAs($user)
            ->get('/profile/'.$profile->username.'/edit');
        $response->assertStatus(200);
    }

}
