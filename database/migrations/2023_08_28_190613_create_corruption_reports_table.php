<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('corruption_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Make 'name' column nullable
            $table->string('email')->nullable(); // Make 'email' column nullable
            $table->string('region');
            $table->string('organization');
            $table->text('incident');
            $table->json('file_paths'); // Assuming you store file paths as JSON
            $table->timestamps(); // This line adds created_at and updated_at columns
        });
    }
    
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corruption_reports');
    }
};
