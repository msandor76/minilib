<?php
namespace foo;

class Test{
	private $a;
	
	function __construct($x=5){
		$this->a = $x;
	}
	
	public function getA(){
		return $this->a;
	}
	
	static function says() {echo 'meoow';}
}
?>
