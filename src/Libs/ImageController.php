<?php

namespace App\Libs;

use Intervention\Image\ImageManager;

class ImageController
{
    public function __construct()
    {
        $imageManager = new ImageManager();
        if(extension_loaded('gd')){var_dump('test');
        exit;}

        phpinfo();
        exit();

        $image = $imageManager->make(getcwd().'/images/test.jpg');
        var_dump($image);
        exit;
    }
}
