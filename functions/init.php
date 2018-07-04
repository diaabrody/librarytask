<?php

ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__ . "/constants.php";
include __DIR__ . "/db.php";
include __DIR__ . "/HelperFunctions.php"; 
include "./models/BaseEntity.php";
include "./models/Book.php";
include "./models/Books.php";
include "./models/Category.php";
include "./models/Categories.php";

