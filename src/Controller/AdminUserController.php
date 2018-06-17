<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 13/06/2018
 * Time: 13:57
 */

namespace App\Controller;


use App\Libs\TwigController;
use App\Repository\UserRepository;

class AdminUserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var TwigController
     */
    private $twig;

    /**
     * AdminUserController constructor.
     * @param UserRepository $userRepository
     * @param TwigController $twig
     */
    public function __construct()
    {
        session_start();
        $this->userRepository = new UserRepository();
        $this->twig = new TwigController();
    }

    public function index()
    {
        echo $this->twig->render('/admin/compte.html.twig', [
            'user' => $_SESSION['auth']
        ]);
    }
}
