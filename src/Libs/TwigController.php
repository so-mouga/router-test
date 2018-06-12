<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 14/05/2018
 * Time: 14:52
 */

namespace App\Libs;


class TwigController
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(getcwd().'/views');
        $twig = new \Twig_Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));

        $twig->addExtension(new \Twig_Extension_Debug());
        $this->twig = $twig;
    }

    public function render($template, $parameters = [])
    {
        return $this->twig->render($template, $parameters);
    }

}
