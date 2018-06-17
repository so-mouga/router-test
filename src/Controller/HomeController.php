<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 14/05/2018
 * Time: 14:22
 */
namespace App\Controller;

use App\Libs\ImageController;
use App\Libs\TwigController;
use App\Repository\MenuRepository;

class HomeController
{
    private $twig;

    public function __construct()
    {
        $this->twig = new TwigController();
        $this->menu = new MenuRepository();
    }

    public function index()
    {
        $language = ($_GET['url'] === 'en') ? 'en' : 'fr';
        $menu = $this->menu->getMenu($language);

/*        $image = new ImageController();*/

        echo $this->twig->render('content.html.twig', [
            'language'  =>  $language,
            'menu'  =>  $menu,
        ]);
    }
}
