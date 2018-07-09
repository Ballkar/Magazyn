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

    public function log($table,$login,$password)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE login=:login AND password=:password");
        $statement->bindValue(':login', $login, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result){
            $_SESSION["zalogowany"]=true;
            $_SESSION["id"]=$result[0]['id'];
            $_SESSION["login"]=$result[0]['login'];
            $_SESSION["admin"]=$result[0]['administracja'];
            return true;
        }else{
            $_SESSION['err_log']="Podano złe dane";
        }
    }

    public function selectProduct($table, $what,$ile_pominac ,$howMuch)
    {
        $statement1 = $this->pdo->query("SELECT COUNT(id_przedmiotu)as ilosc FROM $table WHERE id_przedmiotu>0")->fetch()['ilosc'];

        $statement = $this->pdo->prepare("SELECT $what FROM $table WHERE id_przedmiotu>0  LIMIT $ile_pominac,$howMuch");
        $statement->execute();
        return [
            'wyniki' =>$statement->fetchAll(PDO::FETCH_ASSOC),
            "ile_wynikow" =>$statement1
            ];
    }
    public function findProduct($table, $what,$ile_pominac ,$howMuch,$query)
    {
        $sql = "SELECT COUNT(id_przedmiotu) as ilosc FROM $table WHERE `nazwa_przedmiotu` LIKE '%{$query}%'";
        $statement1 = $this->pdo->query($sql)->fetch()['ilosc'];

        $sql1= "SELECT $what FROM $table WHERE `nazwa_przedmiotu` LIKE '%{$query}%' LIMIT $ile_pominac,$howMuch";
        $statement = $this->pdo->prepare($sql1);
        $statement->execute();
        return [
            'wyniki' =>$statement->fetchAll(PDO::FETCH_ASSOC),
            "ile_wynikow" =>$statement1
        ];
    }
    public function addProduct($table, $what){
        $statement = $this->pdo->prepare("INSERT INTO $table(`id_przedmiotu`, `nazwa_przedmiotu`, `cena`, `ilosc`, `dzial`) VALUES ('',:nazwa,:cena,:ilosc,:dzial)");
        $statement->bindValue(":nazwa",$what['name'],PDO::PARAM_STR);
        $statement->bindValue(":cena",$what['cena'],PDO::PARAM_INT);
        $statement->bindValue(":ilosc",$what['ilosc'],PDO::PARAM_INT);
        $statement->bindValue(":dzial",$what['dzial'],PDO::PARAM_INT);
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
