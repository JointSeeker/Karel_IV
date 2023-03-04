<!-- sekce galerie -->

<section id="gallery">
    <div class="my-gallery">
        <div class="header">
            <h2>Galerie</h2>
            <p>Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
        </div>
        <div class="photos" onscroll="checkGallery()">
           <?php
           $obrazky = new Photo();
           $obrazky->nacti();
            ?>
        </div>
    </div>
</section>