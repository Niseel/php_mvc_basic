<?php  
require_once('base_controller.php');
require_once('models/category.php');

class CategoriesController extends BaseController {
	function __construct() {
		$this->folder = 'categories';
	}
	public function index() {
		
		$categories = Category::showAll();
		$data = ['categories' => $categories];
		
		$this->render('index', $data);	
	}
	public function detail() {
		$categories_detail = Category::showDetail($_GET['id']);
		$data = ['categories_detail' => $categories_detail];
		$this->render('detail', $data);
	}
	public function add() {
		$categories_add = Category::addCategory($_GET['name']);
		if ($categories_add == true) {
			$this->render('add', array('status' => 'Add Success'));		
		} else {
			$this->render('add', array('status' => 'Add Fail'));
		}
	}
	public function edit() {
		$categories_edit = Category::editCategory($_GET['id'], $_GET['name']);
		if ($categories_edit == true) {
			$this->render('edit', array('status' => 'Edit Success'));		
		} else {
			$this->render('edit', array('status' => 'Edit Fail'));
		}	
	}
	public function remove() {
		$categories_remove = Category::removeCategory($_GET['id']);
		$categories_remove ? $this->render('remove', array('status' => 'Remove Success')) : $this->render('remove', array('status' => 'Remove Fail'));
	}
}

?>