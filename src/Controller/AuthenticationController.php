<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 16/05/2018
 * Time: 10:28
 */

namespace App\Controller;


use App\Libs\TwigController;

class AuthenticationController
{
    private $twig;

    public function __construct()
    {
        $this->twig = new TwigController();
    }

    public function login()
    {
        if (isset($_POST['submit']) && !empty($_POST)) {
            //todo connection
            header('Location: /admin/menu');
        }

        echo $this->twig->render('/admin/authentification.html.twig');
    }
}
