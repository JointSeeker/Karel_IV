<?php
mb_internal_encoding("UTF-8");

function nactiTridy($class) : void
{
    require("php/$class.php");
}
spl_autoload_register("nactiTridy");

// Db::pripoj('185.129.138.54', 'f164073', 'cu9PgK2e', 'f164073');
Db::pripoj('localhost', 'root', '', 'karel_iv');
?>

<?php
 $spravceNavstev = new SpravceNavstev();
 $spravceNavstev->zapocitej();
include("html/head.php");
?>
<body onload="loaderFunction()">
<div id="loader">
    <?php include("html/logoSVG.php") ?>
</div>

<div id="myDiv" class="animate-bottom">
<?php
include("html/header.php");
include("html/main.php");
include("html/foodList.php");
include("html/aboutUs.php");
include("html/gallery.php");
include("html/contact.php");
?>

<footer>
    <p><span>J</span>oint<span>S</span>eeker<sup>&copy;</sup></p>
</footer>
</div> 
<script src="js/loader.js" ></script>
<script>
    // function onClick(e) {
    //     e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfSfY4jAAAAAPiVq0qtsQr3b-lmd04LR23XRkCP', {action: 'submit'}).then(function(token) {
            document.getElementById("g-token").value = token;
            });
        });
    // }
</script>
<script src="js/food-menu.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/menu.js"></script>
<script src="js/lightbox-plus-jquery.js"></script>
<script src="js/pageTitle.js"></script>

  
</body>
</html>