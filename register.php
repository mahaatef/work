<?php include('inc/header.php');?>
<?php include('inc/nav.php');?>
<!--  -->
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <?php
            if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error):?>
                <div class="bg-danger p-2 m-2" style="color:white;"><?php echo $error ?></div>
            <?php
                endforeach;
                unset($_SESSION['errors']);
            }//if?>
        <form method="POST" action="handelars/hr.php" enctype="multipart/form-data" >
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="name">
            </div>
            <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="Email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password">
            </div>
            <div class="mb-3">
            <label for="file" class="form-label">upload file</label>
            <input type="file" class="form-control" id="file" name="image">
            </div>
            <input type="hidden" name="id" value="<?php echo uniqid()?>"> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>

<?php include('inc/footer.php');?>

