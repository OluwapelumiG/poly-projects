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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_name');
            $table->string('reporter_contact');
            $table->string('reporter_relationship');
            $table->string('child_name');
            $table->date('child_dob');
            $table->enum('child_gender', ['male', 'female', 'other']);
            $table->string('child_address');
            $table->enum('abuse_type', ['physical', 'emotional', 'sexual', 'neglect', 'other']);
            $table->text('abuse_description');
            $table->dateTime('abuse_date_time');
            $table->string('abuse_location');
            $table->text('perpetrator_details');
            $table->enum('status', ['pending', 'investigated', 'resolved']);
            $table->string('supporting_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
