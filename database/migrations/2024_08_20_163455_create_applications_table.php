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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->unsignedInteger('day');
            $table->string('reason');
            $table->enum('approved', ['Yes', 'No', 'Pending']);
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the foreign key constraint first
        $table->dropForeign(['uid']);

        // Then dropping the uid column
        $table->dropColumn('uid');

        Schema::dropIfExists('applications');
    }
};