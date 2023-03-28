<?php

namespace App\Jobs;

use App\Enums\FeedStatus;
use App\Models\Feed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PublishFeed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Feed $feed,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->feed->update([
            'status' => FeedStatus::PUBLIC->value,
        ]);
    }
}
