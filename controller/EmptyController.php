<?php
require(ROOT . "model/EmptyModel.php");


function index()
{
	$connection = checkConnection();
    render('empty/index', ['connection' => $connection]);
}