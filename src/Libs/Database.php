<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 12/05/2018
 * Time: 15:59
 */

namespace App\Libs;

include (getcwd().'/src/Config/config.php');


class Database
{
    /**
     * @var
     */
    private $db_name = DB_NAME;

    /**
     * @var
     */
    private $db_user = DB_USER;

    /**
     * @var
     */
    private $db_pass= DB_PASSWORD;

    /**
     * @var
     */
    private $db_host = DB_HOST;

    /**
     * @var
     */
    private $pdo;

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query(string $statement, $one = false)
    {
        $req = $this->getPDO()->query($statement);

        if ($one) {
            $datas = $req->fetch(\PDO::FETCH_ASSOC);
        } else {
            $datas = $req->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $datas;
    }

    public function prepare(string $statement, array $attributes, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);

        $req->execute($attributes);
        $req->setFetchMode(\PDO::FETCH_ASSOC);

        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }

        return $data;
    }

    public function insert(string $statement,array $attributes)
    {
/*  'INSERT INTO user (name, lastname) VALUE (?, ?)', ['lulu', 'ok']*/
        $req = $this->getPDO()->prepare($statement);
        $indice = 1;
        foreach ($attributes as &$value) {
            $req->bindParam($indice, $value);
            $indice++;
        }

        return $req->execute();
    }

    public function update(string $statement,array $attributes)
    {
        $req = $this->getPDO()->prepare($statement);
        $indice = 1;

        foreach ($attributes as &$value) {
            $req->bindValue($indice, $value);
            $indice++;
        }

        $req->execute();

        return $req->rowCount();
    }

}
