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
            $table->increments('id');
            $table->string('username', 45)->unique();
            $table->string('forename', 45);
            $table->string('lastname', 45);
            $table->string('user_type', 45);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number', 45)->unique();
            $table->string('professional_address', 45)->nullable();
            $table->string('rpps_number', 45)->unique();
            $table->string('hpc_picture')->nullable(1);
            $table->string('picture')->nullable(1);
            $table->date('date_of_validation')->nullable();
            $table->string('status', 50);
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
