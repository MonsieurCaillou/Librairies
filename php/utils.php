<?php
	
	function getpackage_description($name) {
 		$string = array_pop(explode($name, file_get_contents('stable/Packages')));
 		$lines = explode(PHP_EOL, $string);
 		foreach($lines as $line) {
 			if (strpos($line, 'Description') !== false) {
 				return str_replace("Description: ","",$line);
 				break;
 			}
 		}
 	}
	
	function getfiles($path, $extension) {
		$files = array();
		foreach (new DirectoryIterator($path) as $page) {
			$ext = $page->getExtension();
			$file = $page->getFilename();
			if (!$page->isDot() && $ext == $extension) {
				array_push( $files, $file );
			}
		}
		return $files;
	}
	
	function markdown($file) {
		include_once('https://monsieurcaillou.github.io/Librairies/php/hb.parsedown.php');
		$parsedown = new Parsedown();
		$index= file_get_contents($file);
		$html = $parsedown->text($index);
		echo $html;
	}
	
?>
