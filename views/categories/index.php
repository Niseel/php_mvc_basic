<?php  
$category_url = '\./dev_project/index.php?controller=categories&action=detail';
echo '<ul>';

//var_dump($data);
foreach ($categories as $item) {
  echo '<li>
	<a href="'. $category_url . '&id=' . $item->id . '">' . $item->name . '</a>
  </li>';
}
echo '</ul>';	

?>