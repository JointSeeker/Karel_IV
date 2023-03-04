
<!-- Jídelní lístek -->
<section id="foodList">
    <div class="food-list" onscroll="checkHeader()">
        <h2>Týdenní menu</h2>
        <p>Objednávejte na tel: 574 547 454</p>
        <p>Pouze do 12h!</p>
    </div>
    <div class="week-menu" onscroll="checkMenus()">
        <div class="day-menu">
            <h3>Pondělí</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazPo();
                    ?>
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Úterý</h3>
            <div class="food-items">
                <div class="text">
                <?php
                        $pondeli = new Text();
                        $pondeli->zobrazUt();
                    ?>                
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Středa</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazSt();
                    ?>                
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Čtvrtek</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazCt();
                    ?>                
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Pátek</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazPa();
                    ?>                
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Sobota</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazSo();
                    ?>                
                </div>
            </div>
        </div>
        <div class="day-menu">
            <h3>Neděle</h3>
            <div class="food-items">
                <div class="text">
                    <?php
                        $pondeli = new Text();
                        $pondeli->zobrazNe();
                    ?>                
                </div>
            </div>
        </div>
    </div>
</section>