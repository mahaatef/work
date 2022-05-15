

<?php include('inc/header.php');?>
<?php include('inc/nav.php');?>

<?php
        if(!isset($_SESSION['auth'])){
                header("Location:login.php");
                die;
        }
?>
<div class="container">
        <div class="row">
                <div class="col-8 mx-auto p-2">
                        <h2 class="bg-success p-2">Name:
                                <?php
                                echo $_SESSION['auth'][0];
                                ?>
                        </h2>
                        <h2 class="bg-success p-2">Email:
                        <?php
                                echo $_SESSION['auth'][1];
                        ?>
                        </h2>
                        <h2 class="bg-success p-2">id:
                        <?php
                                echo $_SESSION['auth'][2];
                        ?>
                        </h2>
                </div>
        </div>
</div>
<?php include('inc/footer.php');?>
