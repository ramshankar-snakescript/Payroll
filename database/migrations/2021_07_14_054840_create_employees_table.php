<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('ctc')->nullable();
            $table->string('desg')->nullable();
            $table->string('dept')->nullable();
            $table->string('doj')->nullable();
            $table->string('pan')->nullable();
            $table->string('uan')->nullable();
            $table->string('esi')->nullable();
            $table->string('pran')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
