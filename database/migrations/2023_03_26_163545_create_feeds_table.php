<?php

use App\Enums\FeedStatus;
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
            $table->enum('status', array_column(FeedStatus::cases(), 'value'));
            $table->enum('video_source', array_column(VideoSource::cases(), 'value'));
            $table->string('youtube_video_id')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamp('published_at')->nullable();
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
