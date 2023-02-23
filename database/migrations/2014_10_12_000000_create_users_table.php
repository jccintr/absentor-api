<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('phone',20)->nullable();
            $table->string('doc',20)->nullable();
            $table->string('address',100)->nullable();
            $table->string('password',191);
           // $table->integer('role')->default(2);  // 0-admin 1-gerente 2-funcionario
           // $table->boolean('active')->default(true);
            $table->boolean('bloqueado')->default(false);
            $table->boolean('isAdmin')->default(false);
            $table->string('token',191)->nullable();
            $table->timestamp('token_expire_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar',191)->nullable();
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
};
