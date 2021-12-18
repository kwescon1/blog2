<?php

namespace App\Modules\Base\Services;

use File;
use Image;
use App\Modules\Base\Contracts\CoreServiceInterface;

class CoreService  implements CoreServiceInterface
{

    protected function deleteImage(array $data): void
    {
        foreach ($data as $file) {
            File::delete(public_path() . $file);
        }
    }

    protected function processImage($image, $catName, $size)
    {

        $originalName = $image->getClientOriginalName();

        $newName = 'image-' . time() . $originalName;

        return $this->resizeImage($catName, $image, $newName, $size);
    }

    private function resizeImage($catName, $image, $newName, $size)
    {
        $paths = [];

        for ($i = 0; $i < count($size); $i++) {

            $path = 'assets/storage/uploads/' . $catName . '/' . $size[$i];

            $this->createDirecrotory($path);

            $dimensions = explode('x', $size[$i]);

            $dimension1 = $dimensions[0];
            $dimension2 = $dimensions[1];

            // print($dimension1);
            // die;

            Image::make($image->getRealPath())->fit($dimension1, $dimension2, function ($constraint) {
                $constraint->upsize();
                // $constraint->aspectRatio();
            })->save($path . '/' . $newName);

            // Image::make($image->getRealPath())->resize($dimension1, $dimension2)->save($path . '/' . $newName);

            array_push($paths, $path . '/' . $newName);
        }

        return $paths;
    }

    private function createDirecrotory($dir)
    {


        if (!File::isDirectory($dir)) {

            File::makeDirectory($dir, 0777, true, true);
        }

        return;
    }
}
