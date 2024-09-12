<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            UserDetail::factory()->create(['user_id' => $user->id]);
        });
        // Schema::disableForeignKeyConstraints();
        // User::truncate();
        // UserDetailSeeder::truncate();

        // for ($i = 0; $i < 10; $i++) {
        //     User::query()->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => \Str::random(10),
        //     ]);

        //     UserDetail::query()->create([
        //         'user_id'=> $user->id,
        //         'address'=> fake()->address(),
        //         'phone'=> fake()->phoneNumber(),
        //     ]);
        // }
    }
}
