<?php
require "header.php"; ?>


<?php if(isset($info)) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= $info?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
<?php endif ?>

<section id="main-section">
    
<?php
    if(isset($page)) {
    if($page == 'home')
    require("./View/home.php");
    else
    require("./View/".$page.".php");
    }
?>
</section>

<?php
require "footer.php" ?>