<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nickname')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('line_id')->nullable();
            $table->unsignedInteger('prefecture_id')->nullable();
            $table->string('info')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('status')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
