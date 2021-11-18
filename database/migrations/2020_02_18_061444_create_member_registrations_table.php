<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_no','30')->unique();
            $table->string('member_name','30');
            $table->integer('member_category_id');
            $table->bigInteger('phone');
            $table->string('details', '30');
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
        Schema::dropIfExists('member_registrations');
    }
}