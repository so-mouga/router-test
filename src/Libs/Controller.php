<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 11/05/2018
 * Time: 17:00
 */

namespace App\Libs;


class Controller
{
    public function renderTwig($template, $params = [])
    {
        $loader = new \Twig_Loader_Filesystem(getcwd().'/views');
        $twig = new \Twig_Environment($loader, array(
            'cache' => false,
        ));

        echo $twig->render('test.html.twig', array('the' => 'variables', 'go' => 'here'));
    }

}
