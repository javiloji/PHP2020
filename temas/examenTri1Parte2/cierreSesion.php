<?php

session_start();

session_destroy();

// unset();

header("Location: index.php");


?>