<?php
class Login
{

    private $heslo;

    private $jmeno;

    public function __construct()
    {
        if(isset($_POST['submit'])){
            $this->heslo = $_POST["password"];
            $this->jmeno = $_POST["username"];
        }
    }

    private function overHeslo()
    {
        $sql = Db::dotaz(
            "SELECT * FROM users WHERE username = '{$this->jmeno}'");
        $vypis = $sql->fetch();
        if ($vypis) {
            $_SESSION['unique_id'] = $vypis['unique_id'];
            $hash = $vypis['password'];
            if (password_verify($this->heslo, $hash)) {
                header('Location: admin.php');
            } 
        }else {
                echo "Zadali jste špatné údaje zkuste to znovu";
            }
    }



    public function getHeslo()
    {
        echo $this->overHeslo();
    }
}

?>