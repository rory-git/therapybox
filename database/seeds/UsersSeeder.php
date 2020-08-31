<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'rory',
                'email' => 'test@test.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // password
                'remember_token' => Str::random(10),
            ],
        ]);

        $user = User::find(1);
        $url = 'https://images.unsplash.com/photo-1549845375-ce0a0ba8288c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=280&q=80';
        $user
            ->addMediaFromUrl($url)
            ->toMediaCollection('avatar');
    }
}
