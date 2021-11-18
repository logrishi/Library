<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accession_no');
            $table->string('registration_no','10');
            $table->date('issue_date');
            $table->date('due_date');
            $table->boolean('is_returned')->nullable();
            $table->date('return_date')->nullable();
            $table->double('fine_generated')->nullable();
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
        Schema::dropIfExists('issues');
    }
}