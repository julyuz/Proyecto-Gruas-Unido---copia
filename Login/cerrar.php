<?php
session_start();
unset($_SESSION['Usuario']);
unset($_SESSION['Nivel']);
header("Location: ../iniciar.php");
?>