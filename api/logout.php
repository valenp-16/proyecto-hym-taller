<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: ../registrarse.html");
exit;