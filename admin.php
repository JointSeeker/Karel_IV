<?php
session_start();
if(!isset($_SESSION['unique_id']))
{
    header('Location: login.php');
    exit();
}

if(isset($_GET['odhlasit']))
{
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}


function nactiTridy($class) : void
{
    require("php/$class.php");
}
spl_autoload_register("nactiTridy");



mb_internal_encoding("UTF-8");




Db::pripoj('185.129.138.54', 'f164073', 'cu9PgK2e', 'f164073');
// Db::pripoj('localhost', 'root', '', 'karel_iv');


if(isset($_FILES['picture'])){
   $obrazek = new Photo;
   $obrazek->uploadImages();
    header('Location: admin.php');
    exit; 
}

if(isset($_POST['submit-text'])){
    $menu = new Text();
    $menu->upload();
    header('Location: admin.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Karel</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

    <form action="admin.php" method="get">
    <input type="submit" name="odhlasit" value="Odhlásit">
    </form>

    <header>
        <h1>Ahoj vítej na stránce administrace</h1>
        <p>Zde můžes vidět návštěvnost, ale také upravit týdenní menu nebo přidat obrázek do galerie</p>
    </header>

    <section id="visits">
        <div class="visits">
            <h2>Návštěvnost webu</h2>
            <?php
                $spravceNavstev = new SpravceNavstev();
                $spravceNavstev->vypisStatistiky();
            ?>
        </div>
    </section>


    <section id="menu-form">
        <div class="menu-form">
            <div class="day">
                <h2>Týdenní menu</h2>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                    <label for="days">Vyber den:</label>
                    <select name="days" id="days">
                        <option value="Pondeli">Pondělí</option>
                        <option value="Utery">Úterý</option>
                        <option value="Streda">Středa</option>
                        <option value="Ctvrtek">Čtvrtek</option>
                        <option value="Patek">Pátek</option>
                        <option value="Patek">Sobota</option>
                        <option value="Patek">Neděle</option>
                    </select>
                    <div class="item">
                        <div class="food">
                            <label for="soup">Polévka</label>
                            <input type="text" name="food[0][name]" id="" placeholder="Polévka">
                        </div> 
                        <div class="price">
                            <label for="price-soup">Cena</label>
                            <input type="text" name="food[0][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food">hl jidlo</label>
                            <input type="text" name="food[1][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price">Cena</label>
                            <input type="text" name="food[1][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food1">jidlo 1</label>
                            <input type="text" name="food[2][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price1">Cena</label>
                            <input type="text" name="food[2][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food2">jidlo 2</label>
                            <input type="text" name="food[3][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price2">Cena</label>
                            <input type="text" name="food[3][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food3">jidlo 3 </label>
                            <input type="text" name="food[4][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price3">Cena</label>
                            <input type="text" name="food[4][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food3">Desert</label>
                            <input type="text" name="food[5][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price3">Cena</label>
                            <input type="text" name="food[5][price]" id="" placeholder="cena">
                        </div> 
                    </div>
                    <div class="item">
                        <div class="food">
                            <label for="food3">Extra nabídka </label>
                            <input type="text" name="food[6][name]" id="" placeholder="text...">
                        </div> 
                        <div class="price">
                            <label for="price3">Cena</label>
                            <input type="text" name="food[6][price]" id="" placeholder="cena">
                        </div> 
                    </div>


                    <input type="submit" name="submit-text" value="Zapsat">
                </form>
            </div> 
    </section>

    <section id="add-img">
        <div class="add-img">
            <div class="img-form">
                <h2>Nahraj svůj obrázek do galerie</h2>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <input type="text" name="text" placeholder="Sem zadej text..">
                    <input type="file" name="picture" id="file" hidden>
                    <label for="file" id="selector">Vyber obrázek</label>
                    <input type="submit" name="submit" accept="image/*, .jpeg, .jpg, .png" value="Uložit obrázek">
                </form>
            </div>
        </div>
    </section>



<script src="js/soubor.js"></script>
</body>
</html>