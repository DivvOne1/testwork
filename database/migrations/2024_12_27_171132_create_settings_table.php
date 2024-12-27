<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Запуск миграции.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // добавляем внешний ключ
            $table->string('setting_key');
            $table->string('setting_value');
            $table->timestamps();
        });
    }

    /**
     * Обратная миграция.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
