<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 12/06/2018
 * Time: 23:04
 */

namespace App\Repository;

use App\Entity\User;
use App\Libs\Database;

class UserRepository
{
    const TABLE_NAME_USER   = 'user';
    const COL_NAME_EMAIL    = 'email';
    const COL_NAME_PASSWORD = 'password';

    /**
     * @var Database
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function getUser(string $email, string $password)
    {
        $query = sprintf("select * from %s WHERE %s = :email ", self::TABLE_NAME_USER, self::COL_NAME_EMAIL);
        $resu = $this->pdo->prepare($query, ['email' => $email], true);

        if (!$resu) {
            return null;
        }

        $user = new User($resu['id'], $resu['email'], $resu['password']);

        if (!password_verify($password, $user->getPassword())) {
            return null;
        }
        return $user;
    }

}
