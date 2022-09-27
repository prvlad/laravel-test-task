<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileTrait
{
    /**
     * @param $file
     * @param $path
     * @return string
     */
    public function upload($file, $path): string
    {
        $photoExtension = $file->getClientOriginalExtension();
        $filename = Str::random(8) . ".$photoExtension";

        $path = $path . '/' . $filename;

        Storage::put($path, File::get($file));

        return $filename;
    }

    /**
     * @param $filename
     * @param $path
     * @return bool
     */
    public function deleteFile($filename, $path): bool
    {
        return Storage::delete($path . '/' . $filename);
    }
}
