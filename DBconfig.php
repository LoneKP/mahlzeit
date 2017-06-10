<?php
 
 //$DBhost = "lonekjeldgaard.dk.mysql";
 //$DBuser = "lonekjeldgaard_dk";
 //$DBpass = "8wvSgyUE";
 //$DBname = "lonekjeldgaard_dk";

 $DBhost = "127.0.0.1";
 $DBuser = "root";
 $DBpass = "";
 $DBname = "mahlzeit_dk";
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
