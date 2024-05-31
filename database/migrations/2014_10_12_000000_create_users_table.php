<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        
        Schema::create('k_y_c_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('father_name');
            $table->string('gender');
            $table->string('marital_status');
            $table->date('dob');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->string('doc_front'); // Assuming you'll store document paths
            $table->string('doc_back');  // Assuming you'll store document paths
            $table->boolean('agree')->default(false); // Assuming it's a checkbox for agreement
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('k_y_c_verifications');
    }
};
