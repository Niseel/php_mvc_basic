<?php  
//#connection

class DB {

	private static $connection = null;
	public static function getConnection() {
		try {
			self::$connection = new PDO('mysql:host=localhost;dbname=database_name', 'username', 'password');
			self::$connection->exec("SET NAMES 'utf8'");
		} catch (PDOException $e) {
			echo "ERROR! Co loi xay ra voi PDO";
    		//file_put_contents('error/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
			die($e->getMessage());
		}

		return self::$connection;
	}
}

?>