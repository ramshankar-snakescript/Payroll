<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('rec_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('dos')->nullable();
            $table->string('basic')->nullable();
            $table->string('da')->nullable();
            $table->string('hra')->nullable();
            $table->string('conveyance')->nullable();
            $table->string('working_day')->nullable();
            $table->string('telephone_internet')->nullable();
            $table->string('bonus')->nullable();
            $table->string('wfh')->nullable();
           
            $table->string('work_in_holidays_days')->nullable();
            $table->string('work_in_holidays_hours')->nullable();
            $table->string('extra_hours')->nullable();
            $table->string('allowance')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('tds')->nullable();
            $table->string('esi')->nullable();
            $table->string('pf')->nullable();
            $table->integer('short_leave')->nullable();
            $table->integer('half_day')->nullable();
            $table->integer('leave')->nullable();

            $table->string('labour_welfare')->nullable();
            $table->string('gsalary')->nullable();
            $table->boolean('is_send')->default('0');
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
        Schema::dropIfExists('staff_salaries');
    }
}
