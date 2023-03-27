<?php

use App\Enums\VideoSource;
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
        Schema::create('feeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained();
            $table->text('description');
            $table->string('title');
            $table->json('content');
            $table->enum('video_source', array_column(VideoSource::cases(), 'value'));
            $table->string('youtube_video_id')->nullable();
            $table->boolean('active');
            $table->timestamp('published_at');
            $table->timestamp('unpublished_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};
