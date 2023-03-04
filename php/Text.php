<?php
class Text
{
    protected $text;

    protected $cena;

    protected $food = [];

    public function __construct()
    {
        if(isset($_POST['submit-text']))
        $this->food = $_POST['food'];
    }

    public function upload()
    {
        $sql = Db::dotaz('SELECT * FROM pondeli');

        if (isset($_POST['submit-text']) && $_POST['days'] == 'Pondeli'){
            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM pondeli'
                );
            }

            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

            $sql = Db::dotaz(
                'INSERT INTO pondeli (nazev, cena) VALUES (?, ?)',
                array(htmlspecialchars($this->text),
                htmlspecialchars($this->cena))
                );
            }
        } else if (isset($_POST['submit-text']) && $_POST['days'] == 'Utery') {

            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM utery'
                );
            }

            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $zapis = Db::dotaz(
                    'INSERT INTO utery (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        }else if (isset($_POST['submit-text']) && $_POST['days'] == 'Streda') {
           
            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM streda'
                );
            }
           
            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $sql = Db::dotaz(
                    'INSERT INTO streda (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        }else if (isset($_POST['submit-text']) && $_POST['days'] == 'Ctvrtek') {

            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM ctvrtek'
                );
            }

            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $sql = Db::dotaz(
                    'INSERT INTO ctvrtek (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        }else if (isset($_POST['submit-text']) && $_POST['days'] == 'Patek') {
        
            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM patek'
                );
            }
        
            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $sql = Db::dotaz(
                    'INSERT INTO patek (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        } else if (isset($_POST['submit-text']) && $_POST['days'] == 'Sobota') {

            if ($sql->fetchAll() > 0) {
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM sobota'
                );
            }

            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $sql = Db::dotaz(
                    'INSERT INTO sobota (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        }else if (isset($_POST['submit-text']) && $_POST['days'] == 'Nedele') {
        
            if($sql->fetchAll() > 0){
                $vymazaniDatabaze = Db::dotaz(
                    'DELETE FROM nedele'
                );
            }
        
            foreach ($this->food as $food) {
                $this->text = $food['name'];
                $this->cena = $food['price'];

                $sql = Db::dotaz(
                    'INSERT INTO nedele (nazev, cena) VALUES (?, ?)',
                    array(
                        htmlspecialchars($this->text),
                        htmlspecialchars($this->cena)
                    )
                );
            }
        }
    }

    public function zobrazPo()
    {
        $sql = Db::dotaz('SELECT * FROM pondeli ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];
            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }  
        }
    }
    
    
    
    public function zobrazUt()
    {
        $sql = Db::dotaz('SELECT * FROM utery ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];

            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }  
        }
    }
    
    public function zobrazSt()
    {
        $sql = Db::dotaz('SELECT * FROM streda ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];

            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }  
        }
    }
    
    public function zobrazCt()
    {
        $sql = Db::dotaz('SELECT * FROM ctvrtek ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];

            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }  
        }
    }
    
    public function zobrazPa()
    {
        $sql = Db::dotaz('SELECT * FROM patek ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];
            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }
            
        }
    }
    public function zobrazSo()
    {
        $sql = Db::dotaz('SELECT * FROM sobota ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];
            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }
            
        }
    }
    public function zobrazNe()
    {
        $sql = Db::dotaz('SELECT * FROM nedele ORDER BY id');

        foreach ($sql->fetchAll() as $list) {
            $jidlo = $list['nazev'];
            $cena = $list['cena'];
            if ($cena) {
                echo ("<div class='food-item'>
                <p>$jidlo</p>
                <span class='price'>{$cena}Kč</span>
                </div>");
            }
            
        }
    }
}
?>