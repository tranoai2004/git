<?php

namespace Database\Factories;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    protected $model = UserDetail::class;
   
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date,
        ];
    }
}
