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
            $table->string('doc_back'); 
            $table->string('doc_type'); // Assuming you'll store document paths
            $table->string('doc_no');  // Assuming you'll store document paths
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
        Schema::dropIfExists('k_y_c_verifications');
    }
};
