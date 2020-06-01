<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create(
            [
            'name' => 'Verdi',
            'email' => 'vicotex@gmail.com',
            'password' => bcrypt(94741301),
            'remember_token' => Str::random(10),
            ]
            );
        $this->call(PostsTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
