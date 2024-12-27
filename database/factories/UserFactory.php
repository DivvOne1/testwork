<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'telegram_id' => $this->faker->unique()->numberBetween(1, 99999999),
        ];
    }
}
