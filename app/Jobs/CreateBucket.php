<?php

namespace App\Jobs;

use App\Models\Tenant;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateBucket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Tenant $tenant)
    {
    }

    public function handle(): void
    {
        $client = new S3Client([
            'region' => config('filesystems.disks.s3.region'),
            'version' => '2006-03-01',
            'credentials' => new Credentials(
                config('filesystems.disks.s3.key'),
                config('filesystems.disks.s3.secret')
            ),
        ]);

        $bucketName = Str::slug($this->tenant->name).'-'.strtolower(Str::random(8));

        try {
            $client->createBucket(['Bucket' => $bucketName]);
        } catch (AwsException $e) {
            logger()->error('Error: '.$e->getAwsErrorMessage());
        }
    }
}
