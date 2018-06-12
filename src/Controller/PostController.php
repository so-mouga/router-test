<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 10/05/2018
 * Time: 22:33
 */

namespace App\Controller;

use App\Libs\Database;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;


class PostController
{
    public function show($slug, $id)
    {
        var_dump($slug.'  '. $id. ' '. $_GET['page']);
        exit;
    }

    public function test()
    {
        $test = new Database();
        echo'<pre>';
        $test->update('UPDATE user SET lastname= "mouga" WHERE name = "KEvin" ');
        exit;
        $filesystemLoader = new FilesystemLoader(getcwd().'/views/%name%');
        $templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
        echo $templating->render('hello.php', array('firstname' => 'Fabien'));

    }

    public function twig()
    {
   /*     echo'<pre>';
        print_r($_REQUEST);*/

        $loader = new \Twig_Loader_Filesystem(getcwd().'/views');
        $twig = new \Twig_Environment($loader, array(
            'cache' => false,
        ));

        echo $twig->render('content.html.twig', array('the' => 'variables', 'go' => 'here'));

    }

    public function english($en)
    {
        var_dump($en);
        var_dump('englisj');
        exit;

    }

}
