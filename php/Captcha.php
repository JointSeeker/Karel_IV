<?php
class Captcha
{
    private $secretKey = '6LfSfY4jAAAAAHCusDs0kCU-Wd2caz1UKm8LZzXq';

    public function url()
    {
        $key = $this->secretKey;
        $token = $_POST['g-token'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $key . "&response=" . $token . "&remoteip=" . $ip;
        $request = file_get_contents($url);
        $response = json_decode($request);

        if($response->success)
        {
            $odeslani = new Mailform(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['message']));
            $odeslani->odesliZpravu();
            $odeslani->overOdeslani();
        } else {
            return "Chyba!";
        }
        
    }
    
}


?>