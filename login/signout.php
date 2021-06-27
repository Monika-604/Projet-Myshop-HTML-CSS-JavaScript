<?php
setcookie("user", "", time()-3600,"/");
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location:../index.php');
exit();
//die;

// si c'est établi session,
// mais si avec cookie, on donne la date ancienne et après on renvoie sur index
