<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 16/05/2018
 * Time: 15:42
 */

namespace App\Controller;


use App\Libs\TwigController;

class AdminImageController
{
    private $twig;

    public function __construct()
    {
        $this->twig = new TwigController();
    }

    public function index()
    {
        echo $this->twig->render('/admin/image.html.twig', [

        ]);
    }
}
