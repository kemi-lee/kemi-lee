<?php

session_start();

unset( $_SESSION['userid'] );


session_destroy();


echo "You are now logged out ";

?>