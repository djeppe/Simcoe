<?php
/**
 * Standard controller layout.
 * 
 * @package SimcoeCore
 */
class CCIndex implements IController {
	/**
	 * Implementing interface IController. All controllers must have an index action.
	 */
	public function Index() {
		global $sim;
		$sim->data['title'] = "The Index Controller";
	}
}
?>