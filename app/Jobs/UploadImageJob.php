<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $images;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($images)
    {
        $this->images = $images;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->images as $images) {
            foreach ($images['path'] as $image) {
                $contents = file_get_contents($image);
                $name = explode('?', substr($image, strrpos($image, '/') + 1));
                $path = date('Y-m-d') . '/' . Str::uuid() . $name[0];
                Storage::disk('images')->put($path, $contents);
                Image::create([
                    'product_id' => $images['id'],
                    'path' => $path
                ]);
            }
        }
    }
}
