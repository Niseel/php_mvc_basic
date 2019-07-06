<?php  
require_once('base_controller.php');

class PagesController extends BaseController {
	function __construct() {
		$this->folder = 'pages';
	}
	public function home() {
		$profile = [
			'name' => 'Thanh',
			'age' => 20
		];
		$this->render('home', $profile);
	}
	public function error() {
		$this->render('error');
	}
}
?>