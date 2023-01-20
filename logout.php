<?php
@session_start();
@setcookie("k_mail", "", -86400);
@setcookie("k_adi", "", -86400);
@setcookie("k_profil", "", -86400);
@setcookie(session_name(), '', 0, '/');
@session_unset();
@session_write_close();
@session_regenerate_id(true);
@session_destroy();
header('location: /login/');