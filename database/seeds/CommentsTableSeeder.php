<?php
namespace Database\Seeders;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comments')->insert([
            'user_id' => 1,
            'profile_id' => 3,
            'message' => Str::random(100),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        /*
        DB::table('comments')->insert([

        ]);
        factory(Comment::class, 10)->create();
            Comment::factory()
            ->count(15);*/
    }
}
