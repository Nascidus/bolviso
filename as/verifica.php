<?php
session_start();
if( (!isset($_SESSION['login'])) AND (!isset($_SESSION['senha'])) )
   Header("Location: index.php?erro=logar");
?>
