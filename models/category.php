<?php  
class Category {
	public $id;
	public $name;
	public $created_at;
	public $updated_at;

	function __construct ($_id, $_name, $_created_at, $_updated_at) {
		$this->id = $_id;
		$this->name = $_name;
		$this->created_at = $_created_at;
		$this->updated_at = $_updated_at;
	}

	static function showAll() {
		$list = [];
		$db = DB::getConnection();
		$rs = $db->prepare('SELECT * FROM category');
		$rs->execute();
		while ($item = $rs->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new Category($item['id'], $item['name'], $item['created_at'], $item['updated_at']);
		}
		return $list;
	}

	static function showDetail($id) {

		$list = [];
		$db = DB::getConnection();
		$rs = $db->prepare('SELECT * FROM category WHERE id = :id LIMIT 1');
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$rs->execute(array('id' => $id)); //solution 1

		while($item = $rs->fetch()) {
			$list[] = new Category($item['id'], $item['name'], $item['created_at'], $item['updated_at']);
		}
		//var_dump($list);
		return $list;
	}
	static function addCategory($name) {
		$db = DB::getConnection();
		$rs = $db->prepare('INSERT INTO category (name) values (:name)');
		//$rs->bindParam(':name', $name);
		//
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		if ($rs->execute(array('name' => $name))){  //solution 2
			return true;
		} else {
			return false;
		}
	}
	static function editCategory($id, $name) {
		$db = DB::getConnection();
		$rs = $db->prepare('UPDATE category SET name=:name WHERE id = :id');
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		if ($rs->execute(array('name' => $name, 'id' => $id))){  //solution 2
			return true;
		} else {
			return false;
		}	
	}
	static function removeCategory($id) {
		$db = DB::getConnection();
		$rs = $db->prepare('DELETE FROM category WHERE id = :id');
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		return $rs->execute(array('id' => $id)) ? true : false;
	}
}

?>