<?php

class UserDependController extends BaseController {

	protected $user;

	public function __construct() 
	{
		$this->user = Auth::user();
   	}

}