<?php
session_start();
session_destroy();

$page="index.php?action=login";
header('location:'.$page);
