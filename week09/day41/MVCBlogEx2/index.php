<?php
session_start();

require("model.php");

$navLinks = getNavLinks(); 
$articleRetrieve = getArticle();
$commentsReceived = getComments();

require("indexView.php");