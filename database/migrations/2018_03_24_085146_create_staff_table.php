<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_staff', function (Blueprint $table) {
            $table->increments('staff_id')->unique();
            $table->boolean('god_eye')->default(0);
            $table->boolean('gm')->default(0);
            $table->integer('role_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->boolean('status')->default(1)->comment('Should relate with a status table i.e resigned, active');
            $table->boolean('mgr')->default(0);
            $table->boolean('area_sup')->default(0);
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->integer('gender')->default(0);
            $table->integer('m_status')->default(0);
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->date('dob')->nullable();
            $table->integer('state_id')->nullable();
            $table->date('resumption_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->string('address',200)->nullable();
            $table->string('pics',100)->default('no_pic.jpg');
            $table->string('g_1_name',100)->nullable();
            $table->string('g_2_name',100)->nullable();
            $table->string('g_1_phone',100)->nullable();
            $table->string('g_2_phone',100)->nullable();
            $table->string('cv',100)->nullable();
            $table->string('waec_neco',100)->nullable();
            $table->string('university',100)->nullable();
            $table->string('nysc',100)->nullable();
            $table->text('other_docs',100)->nullable();

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
        Schema::dropIfExists('tbl_staff');
    }
}
