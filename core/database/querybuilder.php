<?php

namespace App\core\database;

use PDO;
use App\core\User;
use App\core\Product;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function logUser($login, $password)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE login=:login AND password=:password");
        $statement->bindValue(':login', $login, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetchAll(PDO::FETCH_CLASS, User::class);

        if ($user) {
            $_SESSION["logged"] = true;
            $_SESSION["id"] = $user[0]->id;
            $_SESSION["login"] = $user[0]->login;
            $_SESSION["admin"] = $user[0]->administracja;
            return true;
        } else {
            $_SESSION['err_log'] = "Podano złe dane";
            return false;
        }
    }


    public function countProduct($table)
    {
        $statement1 = $this->pdo->query("SELECT COUNT(id_przedmiotu)as ilosc FROM $table WHERE id_przedmiotu>0")
            ->fetch()['ilosc'];

        return $statement1;
    }

    public function selectProducts($table, $skip, $stop)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id_przedmiotu>0  LIMIT $skip,$stop");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    public function returnProductFromId($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE `id_przedmiotu`=$id");
        $statement->execute();
        $product = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $product[0];
    }


    public function addProduct($table, $data)
    {
        $statement = $this->pdo->prepare("INSERT INTO 
$table(`id_przedmiotu`, `nazwa_przedmiotu`, `cena`, `ilosc`, `dzial`) VALUES ('',:nazwa,:cena,:ilosc,:dzial)");
        $statement->bindValue(":nazwa", $data['name'], PDO::PARAM_STR);
        $statement->bindValue(":cena", $data['cena'], PDO::PARAM_INT);
        $statement->bindValue(":ilosc", $data['ilosc'], PDO::PARAM_INT);
        $statement->bindValue(":dzial", $data['dzial'], PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @param $id
     * @param $dataname
     * @param $datavalue
     */
    public function editProduct($id, $dataname, $datavalue)
    {
        $statement = $this->pdo->prepare("UPDATE `magazyn` SET $dataname=:value WHERE `id_przedmiotu` =$id");
        $statement->bindValue(":value", $datavalue, PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * delete product with $id from DB
     * @param $id
     */
    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM `magazyn` WHERE `id_przedmiotu` = $id");
        $statement->execute();
    }

    /**
     * Add new user account
     * @param $table
     * @param $login
     * @param $password
     * @param $email
     */
    public function addNewAccount($table, $login, $password, $email)
    {
        $statement = $this->pdo->prepare("INSERT INTO $table (`id`,`login`,`password`,`email`, `administracja`) 
VALUES ('',:login,:password,:email, '0')");
        $statement->bindValue(":login", $login, PDO::PARAM_STR);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":email", $email);
        $statement->execute();
    }

    /**
     * Use to check if user log/password exist
     * @param $table
     * @param $IndexArray
     * @param $ValueArray
     * @return bool
     */
    public function checkInDataBase($table, $IndexArray, $ValueArray)
    {
        for ($i = 0; $i < count($IndexArray); $i++) {
            $sql = "SELECT COUNT('id') as ilosc FROM $table WHERE `$IndexArray[$i]` = '" . $ValueArray[$i] . "'";
            $statement = $this->pdo->query($sql)->fetch()['ilosc'];
            if ($statement == 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
