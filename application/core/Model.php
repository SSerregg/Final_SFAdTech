<?php

class Model extends BD_Config 
{

	protected static function connect(){

		$dns = "mysql:host=".self::$host.";dbname=".self::$dbname.";charset=".self::$charset;
	try{
		return new PDO($dns, self::$user, self::$password);
		
	}
	catch(PDOException){
		echo 'нет соединения с базой';
		return null;
	}
    }



}
