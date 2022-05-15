<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <?php if(isset($_SESSION['auth'])):?>
        <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <?php endif;?>
        <?php if(!isset($_SESSION['auth'])):?>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
        </li>
        <?php endif;?>
        <?php if(!isset($_SESSION['auth'])):?>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php endif;?>
        </ul>
        <ul class="ml-auto mb-lg-0 mb-2 navbar-nav ">
        <?php if(isset($_SESSION['auth'])):?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php endif;?>
        <?php if(isset($_SESSION['auth'])):?>
            <li class="nav-item">
                <a class="nav-link" href="allUser.php">USER</a>
            </li>
        <?php endif;?>
        </ul>
    </div>
</nav>