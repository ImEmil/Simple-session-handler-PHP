<?php
class Sessions{

	public function refresh($page, $seconds) {
	echo '<meta http-equiv="refresh" content="'.$seconds.';url='.$page.'">';
	}

	public function c_session () {
		return(isset($_SESSION['logged'])) ? true : false;
	}
	
	public function isLoggedIn() {
		if ($this->c_session() === true) {
			return true;
			}
			else {
				return false;
			}
		}
	 
	public function isLoggedOut() {
		if ($this->c_session() === false) {
			return true;
			}
			else {
				return false;
			}
		}
	}
?>
