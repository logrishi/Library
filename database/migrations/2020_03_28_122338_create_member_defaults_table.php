<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_defaults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_category', '20');
            $table->integer('max_books');
            $table->integer('max_days');
            $table->double('fine_amount');
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
        Schema::dropIfExists('member_defaults');
    }
}