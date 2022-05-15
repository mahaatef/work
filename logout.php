<?php
include('core/f.php');
session_start();
session_destroy();
redirect('login.php');
die;
