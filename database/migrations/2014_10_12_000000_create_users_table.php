<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unique();
            $table->string('username',50)->unique();
            $table->string('password',100);
            $table->string('rights')->nullable();
            $table->string('subrights')->nullable();
            $table->string('suberrights')->nullable();
            $table->boolean('active')->default(1)->comment("0-inactive 1-active");
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
        Schema::dropIfExists('tbl_users');
    }
}
