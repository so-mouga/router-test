<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 16/05/2018
 * Time: 10:28
 */

namespace App\Controller;


use App\Libs\TwigController;
use App\Repository\UserRepository;

class AuthenticationController
{
    /**
     * @var TwigController
     */
    private $twig;

    /**
     * @var UserRepository
     */
    private $user;

    public function __construct()
    {
        session_start();

        $this->twig = new TwigController();
        $this->user = new UserRepository();
    }

    public function login()
    {
        if ($_SESSION['auth']) {
            header('Location: /admin/menu');
        }

        if (isset($_POST['submit']) && !empty($_POST) && $_POST['email'] && $_POST['password']) {

            $user = $this->user->getUser($_POST['email'], $_POST['password']);

            if ($user) {
                $_SESSION['auth'] = $user;
                header('Location: /admin/menu');
            }
            $error = 'mot de passe ou email incorrect';
/*            var_dump(password_hash('admin', PASSWORD_BCRYPT));*/
        }

        echo $this->twig->render('/admin/authentification.html.twig', [
            'error' => $error
        ]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: /admin');
    }
}
