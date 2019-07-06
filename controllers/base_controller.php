<?php  

class BaseController {

	protected $folder;

	function render($file, $data = array()) {

		$view_file = 'views/' . $this->folder . '/' . $file . '.php';
		//echo $view_file;
		if(is_file($view_file)) {
			//var_dump($data);
			extract($data);
			ob_start();
			require_once($view_file);
			$content = ob_get_clean();
			//echo $content;
			require_once('views/layout/application.php');
		} else {
			//header('Location: index.php?controller=pages&action=error');
		}
	}
}

?>