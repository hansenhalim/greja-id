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
        Schema::create('church_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained();
            $table->foreignId('church_location_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('attendance_amount');
            $table->text('additional_note');
            $table->text('berita_acara');
            $table->boolean('active');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('church_services');
    }
};
