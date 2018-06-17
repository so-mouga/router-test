<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 14/05/2018
 * Time: 15:28
 */

namespace App\Controller;

use App\Entity\Menu;
use App\Libs\TwigController;
use App\Repository\MenuRepository;

class AdminMenuController
{
    private $twig;

    public function __construct()
    {
        session_start();

        if (!$_SESSION['auth']) {
            header('Location: /admin');
        }
        $this->twig = new TwigController();
    }

    public function index()
    {
        $menuRepository = new MenuRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valid'])) {
            $menuFr = new Menu($_POST['id_fr'], $_POST['menuName_fr'], $_POST['starter_fr'], $_POST['starterDescription_fr'], $_POST['dish_fr'], $_POST['dishDescription_fr'], $_POST['dessert_fr'], $_POST['dessertDescription_fr']);
            $menuEn = new Menu($_POST['id_en'], $_POST['menuName_en'], $_POST['starter_en'], $_POST['starterDescription_en'], $_POST['dish_en'], $_POST['dishDescription_en'], $_POST['dessert_en'], $_POST['dessertDescription_en']);

/*            $menuRepository->updateMenu($menuFr, 'fr');*/
            $menuRepository->updateMenu($menuEn, 'en');
        }

        $menuFr = $menuRepository->getMenu('fr');
        $menuEn = $menuRepository->getMenu('en');

        echo $this->twig->render('/admin/menu.html.twig', [
            'menu_fr'   =>  $menuFr,
            'menu_en'   =>  $menuEn,
        ]);
    }
}
