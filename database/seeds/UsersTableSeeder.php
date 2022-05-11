<?php
namespace Database\Seeders;

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        DB::table('users')->insert([

        ]);*/
        factory(User::class, 10)->create()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make());
        });
    }
}
