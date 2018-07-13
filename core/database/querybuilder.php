<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-03-26
 * Time: 17:42
 */

class querybuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function logUser($login,$password)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE login=:login AND password=:password");
        $statement->bindValue(':login', $login, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetchAll(PDO::FETCH_CLASS, user::class);

        if ($user){
            $_SESSION["zalogowany"]=true;
            $_SESSION["id"]=$user[0]->id;
            $_SESSION["login"]=$user[0]->login;
            $_SESSION["admin"]=$user[0]->administracja;
            return true;
        }else{
            $_SESSION['err_log']="Podano złe dane";
        }
    }


    public function countProduct($table)
    {
        $statement1 = $this->pdo->query("SELECT COUNT(id_przedmiotu)as ilosc FROM $table WHERE id_przedmiotu>0")->fetch()['ilosc'];

        return $statement1;
    }
    public function selectProducts($table, $skip ,$stop)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id_przedmiotu>0  LIMIT $skip,$stop");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS,product::class);
    }
    public function returnProductFromId($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE `id_przedmiotu`=$id");
        $statement->execute();
        $product = $statement->fetchAll(PDO::FETCH_CLASS, product::class);
        return $product[0];
    }


    public function addProduct($table, $data){
        $statement = $this->pdo->prepare("INSERT INTO $table(`id_przedmiotu`, `nazwa_przedmiotu`, `cena`, `ilosc`, `dzial`) VALUES ('',:nazwa,:cena,:ilosc,:dzial)");
        $statement->bindValue(":nazwa",$data['name'],PDO::PARAM_STR);
        $statement->bindValue(":cena",$data['cena'],PDO::PARAM_INT);
        $statement->bindValue(":ilosc",$data['ilosc'],PDO::PARAM_INT);
        $statement->bindValue(":dzial",$data['dzial'],PDO::PARAM_INT);
        $statement->execute();
    }

    public function deleteProduct($table, $id){
        $statement = $this->pdo->prepare( "DELETE FROM $table WHERE `id_przedmiotu` = $id");
        $statement->execute();
    }

    public function addNewAccount($table, $login, $password,$email){
        $statement = $this->pdo->prepare("INSERT INTO $table (`id`,`login`,`password`,`email`, `administracja`) VALUES ('',:login,:password,:email, '0')");
        $statement->bindValue(":login",$login,PDO::PARAM_STR);
        $statement->bindValue(":password",$password);
        $statement->bindValue(":email",$email);
        $statement->execute();
    }

    public function CheckInDataBase($table,$IndexArray,$ValueArray){
        for ($i=0;$i<count($IndexArray);$i++){
            $sql="SELECT COUNT('id') as ilosc FROM $table WHERE `$IndexArray[$i]` = '".$ValueArray[$i]."'";
            $statement= $this->pdo->query($sql)->fetch()['ilosc'];
            if ($statement==0){
                return true;
            }else{
                return false;
            }
        }
    }
}
