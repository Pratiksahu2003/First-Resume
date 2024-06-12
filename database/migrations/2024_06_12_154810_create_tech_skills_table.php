<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('tech_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('skillName');
            $table->string('proficiencyLevel');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tech_skills');
    }
}

