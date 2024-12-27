<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use App\Models\VerificationCode;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Создаем тестовых пользователей
        $users = User::factory()->count(5)->create();

        foreach ($users as $user) {
            // Создаем тестовые настройки для каждого пользователя
            Setting::create([
                'user_id' => $user->id,
                'setting_key' => 'example_setting_' . $user->id,
                'setting_value' => 'example_value_' . $user->id,
            ]);

            // Создаем тестовые коды подтверждения для каждого пользователя
            VerificationCode::create([
                'user_id' => $user->id,
                'code' => '123456', // пример кода
                'method' => 'sms', // пример метода
            ]);
        }
    }
}
