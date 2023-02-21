<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MigrateLocalFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate local file to AWS S3 bucket';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $files = Storage::disk('public')->files('files');

        foreach ($files as $file) {
            $publicFile = File::get(storage_path() . '/app/public/' . $file);

            echo Storage::disk('s3')->put($file, $publicFile);

        }
    }
}
