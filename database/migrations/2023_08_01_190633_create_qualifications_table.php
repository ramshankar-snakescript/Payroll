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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('image')->nullable();
            $table->string('degree')->nullable();
            $table->string('year')->nullable();
            $table->string('score')->nullable();
            $table->string('mdegree')->nullable();
            $table->string('myear')->nullable();
            $table->string('mscore')->nullable();
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
        Schema::dropIfExists('qualifications');
    }
};
