<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Запуск миграции.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('telegram_id')->nullable()->unique();
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
        Schema::dropIfExists('users');
    }
};
