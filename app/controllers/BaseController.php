<?php

class BaseController extends Controller {

	public function __construct() {
	    $this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
	    //$this->beforeFilter('ajax', array('on' => array('delete', 'put')));
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
        // Change Blade syntax for not crash with Polymer
        Blade::setContentTags('<%', '%>');              // for variables and all things Blade
        Blade::setEscapedContentTags('<%%', '%%>');     // for escaped data
        
		if (!is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}
	
}