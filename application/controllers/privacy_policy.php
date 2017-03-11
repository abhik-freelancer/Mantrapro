<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class privacy_policy extends CI_Controller {
	public function index()
	{
		$page = 'privacy_policy/privacy-policy';
		$header = "";
		$session="";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
 
}

?>