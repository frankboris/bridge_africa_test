<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param UploadedFile $file
     * @param string|null $path
     * @return string|null
     */
    public function uploader(UploadedFile $file, $path = null)
    {
        return $file->storePublicly($path, ['disk' => 'public']);
    }
}
