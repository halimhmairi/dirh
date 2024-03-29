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
        Schema::create('dirh_jobs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string('slug'); // Field name same as your `saveSlugsTo`
            $table->string("jobsummary");
            $table->text("description");
            $table->string("tags");
            $table->string("status");
            $table->date("publish_at");
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
        Schema::dropIfExists('dirh_jobs');
    }
};
