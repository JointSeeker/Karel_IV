<?php
class Mailform
{
    private $name;
    private $email;
    private $message;

    public string $warning = "";

    public function __construct($name, $email, $message)
    {
        $this->name = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
        $this->message = htmlspecialchars($message);
    }


    public function odesliZpravu()
    {
        $header = "From: <$this->email>" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $address = "jointseeker@gmail.com";
        $item = "Nová zpráva z webovek od: $this->name";
        $success = mail($address, $item, $this->message, $header);

        if($success){
            return $success;
        }else {
            $this->warning = 'Email se nepodařilo odeslat. Zkontrolujte adresu.';
        }
    }

    public function overOdeslani()
    {
        
        if ($this->warning)
        echo('<p>' . htmlspecialchars($this->warning) . '</p>');

        $this->name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $this->email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $this->message = (isset($_POST['message'])) ? $_POST['message'] : '';
    }
}

?>