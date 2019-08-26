<?php
require './config.php';
if(isset($_GET['register'])){
	require_once("./api/register.php");
}