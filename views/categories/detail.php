<?php  

if (empty($categories_detail)) {
	echo 'NULL';
} else {
	foreach ($categories_detail as $item) {
		echo $item->id . ' : ' . $item->name;	
	}
}

?>