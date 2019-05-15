<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubstitutionScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidreason
     */
    public function up()
    {
        Schema::create('substitution_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->json('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('substitution_schedules');
    }
}
