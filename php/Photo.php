<?php
class Photo 
{
    protected $fileName;
    protected $fileTmp;
    protected $fileType;
    protected $fileSize;
    protected $fileError;

    protected $fileDesc;
    
    public function __construct()
    {
        if (count($_FILES) > 0){
            $this->fileName = $_FILES['picture']['name'];
            $this->fileTmp = $_FILES['picture']['tmp_name'];
            $this->fileSize = $_FILES['picture']['size'];
            $this->fileError = $_FILES['picture']['error'];
            $this->fileType =$_FILES['picture']['type'];
            $this->fileDesc = htmlspecialchars($_POST['text']);
        }
    }
    
    public function uploadImages()
    {
        //if Button push
        if(isset($_POST['submit']) && $_POST['submit']=='Uložit obrázek'){
            //get type after .
            $kabom = explode(".", $this->fileName);
            //get image type
            $fileExtnsion = end($kabom);
            
            $fileName = "KarelIV". date('YmdHis') .".".$fileExtnsion;
            
            if(!$this->fileTmp){
                echo "Error: Prosím vyber soubor před odesláním";
                exit();
            }
            elseif ($this->fileSize > 20242880){
                echo "Error: Tvůj soubor ve větší než 5MB";
                unlink($this->fileTmp);
                exit();
            }
            elseif (!preg_match("/.(gif|jpg|png)$/i", $this->fileName)){
                echo "ERROR: Your image was not .gif, .jpg, or .png.";
                unlink($this->fileTmp);
                exit();
            } elseif ($this->fileError==1){
                echo "Error: Prosím zkuste to znovu";
                exit();
            }

            $movePicture = move_uploaded_file($this->fileTmp, "php/Galerie/".htmlspecialchars(trim($fileName)));
            $sql = Db::dotaz('INSERT INTO galerie (obrazek , popis) VALUES (?, ?)',
                array(htmlspecialchars(trim($fileName)), htmlspecialchars(trim($this->fileDesc))));

            if($movePicture == false){
                echo "Error: Soubor nebyl nahrán.";
                exit();
            }
        }
    }
    

        // public function uloz($obrazek, $popis) : PDOStatement 
        // {
        //     $sql = Db::dotaz('INSERT INTO galerie (obrazek , popis) VALUES (?, ?)',
        //             array($obrazek, $popis));

        //     return $sql;
        // }

    public function nacti() : void
    {
        $sql = Db::dotaz('SELECT * FROM galerie ORDER BY id');
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
            $obrazek = $row['obrazek'];
            $popis = $row['popis'];

            echo ("<a class='image-link' href='php/Galerie/$obrazek' data-lightbox='set' data-title='$popis'>
            <img class='image' src='php/Galerie/$obrazek' alt='$popis'/>
        </a>");
        }
    }
    
}
?>