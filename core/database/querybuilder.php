<?php

namespace App\core\database;

use PDO;
use App\core\User;
use App\core\Product;

class QueryBuilder
{

    protected $pdo;
    protected $userTableName;
    protected $productTableName;

    public function __construct(PDO $pdo, $config)
    {
        $this->pdo = $pdo;
        $this->userTableName = $config['database']['userTable'];
        $this->productTableName = $config['database']['storageTable'];
    }

    public function logUser($login, $password)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->userTableName WHERE login=:login AND password=:password");
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
            $_SESSION['errorLog'] = "Podano złe dane";
            return false;
        }
    }


    public function countProduct()
    {
        $statement1 = $this->pdo->query("SELECT COUNT(id)as number FROM $this->productTableName WHERE id>0")
            ->fetch()['number'];

        return $statement1;
    }

    public function selectProducts($table, $skip, $stop)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE `id`>0  LIMIT $skip,$stop");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    public function returnProductFromId($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->productTableName WHERE `id`=$id");
        $statement->execute();
        $product = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $product[0];
    }


    public function addProduct($data)
    {
        $statement = $this->pdo->prepare("INSERT INTO 
$this->productTableName (`id`, `productName`, `price`, `number`, `section`) VALUES ('',:name,:price,:number,:section)");
        $statement->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $statement->bindValue(":price", $data['price'], PDO::PARAM_INT);
        $statement->bindValue(":number", $data['number'], PDO::PARAM_INT);
        $statement->bindValue(":section", $data['section'], PDO::PARAM_INT);
        $statement->execute();
    }

    public function editProduct($id, $dataName, $dataValue)
    {
        $statement = $this->pdo
            ->prepare("UPDATE $this->productTableName SET $dataName=:value WHERE `id` =$id");
        $statement->bindValue(":value", $dataValue, PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * delete product with $id from DB
     * @param $id
     */
    public function deleteProduct($id)
    {
        $statement = $this->pdo
            ->prepare("DELETE FROM $this->productTableName WHERE `id` = $id");
        $statement->execute();
    }

    /**
     * Add new user account
     * @param $login
     * @param $password
     * @param $email
     */
    public function addNewAccount($login, $password, $email)
    {
        $statement = $this->pdo->prepare("
INSERT INTO $this->userTableName (`id`,`login`,`password`,`email`, `administracja`) 
VALUES ('',:login,:password,:email, '0')");
        $statement->bindValue(":login", $login, PDO::PARAM_STR);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":email", $email);
        $statement->execute();
    }

    /**
     * Use to check if user log/password exist
     * @param $IndexArray
     * @param $ValueArray
     * @return bool
     */
    public function checkInDatabase($IndexArray, $ValueArray)
    {
        for ($i = 0; $i < count($IndexArray); $i++) {
            $sql = "SELECT COUNT('id') as number FROM $this->userTableName 
WHERE `$IndexArray[$i]` = '" . $ValueArray[$i] . "'";
            $statement = $this->pdo->query($sql)->fetch()['number'];
            if ($statement == 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
