<?php

namespace App\Providers;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakerImageProvider extends Base
{
    /**
     * @param string $dir
     * @param string $category
     * @param int $width
     * @param int $height
     * @return string
     */
    public function newImage(string $dir = '', string $category = '', int $width = 640, int $height = 480): string
    {
        $fileName = Str::random(8) . '.jpg';
        $newFileName = $dir . '/' . $fileName;

        try {
            $file = file_get_contents("https://loremflickr.com/$width/$height/$category");
            Storage::put($newFileName, $file);

            return $fileName;
        } catch (\Throwable $e) {
            report($e);
            return '';
        }
    }
}
