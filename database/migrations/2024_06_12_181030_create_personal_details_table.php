<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('additional_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->text('objective');
            $table->text('about_us');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('additional_details');
    }
}
