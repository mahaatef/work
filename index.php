<?php include('inc/header.php');?>
<?php include('inc/nav.php');?>

<div class="container">
        <div class="text-center">
                
                <h1>Home Page</h1>
                <?php if(isset($_SESSION['login'])):?>
                        <h2>Welcom agin... </h2>
                <?php endif;?>
        </div>
</div>

<?php include('inc/footer.php');?>