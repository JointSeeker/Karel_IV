<?php
class SpravceNavstev
{

    public function zapocitej() : void
    {
        Db::dotaz('INSERT INTO zobrazeni (ip, datum) VALUES (?, ?)',
                        array($_SERVER['REMOTE_ADDR'], time()));
    }

    public function zobrazeniCelkem() : int
    {
        $vysledek = Db::dotaz(
            'SELECT COUNT(*) AS pocet FROM zobrazeni'
        );
        $data = $vysledek->fetch();
        return $data['pocet'];
    }

    public function zobrazeniZa(int $dnu) : int
    {
        $vysledek = Db::dotaz(
            'SELECT COUNT(*) AS pocet FROM zobrazeni WHERE datum > ?',
            array(time() - $dnu * 86400)
        );
        $data = $vysledek->fetch();
        return $data['pocet'];
    }

    public function uipCelkem() : int
    {
        $vysledek = Db::dotaz(
            'SELECT COUNT(DISTINCT ip) AS pocet FROM zobrazeni'
        );
        $data = $vysledek->fetch();
        return $data['pocet'];
    }

    public function uipZa(int $dnu) : int
    {
        $vysledek = Db::dotaz(
            'SELECT COUNT(DISTINCT ip) AS pocet FROM zobrazeni WHERE datum > ?',
            array(time() - $dnu * 86400)
        );
        $data = $vysledek->fetch();
        return $data['pocet'];
    }

    public function vypisStatistiky() : void
    {
    echo("<div class='statistic'>");
        echo("<div class='uip'>");
            echo("<div class='count'>
                    <h3>UIP celkem</h3>
                    <div class='ring'>
                        <p>" . $this->uipCelkem() ."</p>
                    </div>
                    </div>");
                echo("<div class='count'>
                    <h3>UIP za měsíc</h3>
                    <div class='ring'>
                        <p>" . $this->uipZa(30) ."</p>
                    </div>
                    </div>");
                echo("<div class='count'>
                    <h3>UIP za týden</h3>
                    <div class='ring'>
                        <p>" . $this->uipZa(7) ."</p>
                    </div>
                    </div>");
        echo("</div> <div class='view'>");
                echo("<div class='count'>
                    <h3>Zobrazení celkem</h3>
                    <div class='ring'>
                        <p>" . $this->zobrazeniCelkem() ."</p>
                    </div>
                    </div>");
                echo("<div class='count'>
                    <h3>Zobrazení za měsíc</h3>
                    <div class='ring'>
                        <p>" . $this->zobrazeniZa(30) ."</p>
                    </div>
                    </div>");
                echo("<div class='count'>
                        <h3>Zobrazení za týden</h3>
                        <div class='ring'>
                            <p>" . $this->zobrazeniZa(7) ."</p>
                        </div>
                    </div>");
    echo("</div></div>");
    }
}
?>