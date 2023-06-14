<?php

require_once('../config/config.php');

unset($_SESSION['username']);
unset($_SESSION['iduser']);
unset($_SESSION['password']);
unset($_SESSION['token']);
echo "<script>window.location='" . base_url() . "/admin/login.php';</script>";
