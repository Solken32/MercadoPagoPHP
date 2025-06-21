<?php
$request = $_SERVER['REQUEST_URI'];
$page = trim($request, '/'); 
$page = $page ?: 'index';

$file = "view/pages/tienda/{$page}.php";

if (file_exists($file)) {
    include $file;
} else {
    include "view/pages/404.php";
}
