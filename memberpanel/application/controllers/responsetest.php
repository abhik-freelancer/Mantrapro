<?php
/*
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class responsetest extends CI_Controller {
	 public function __construct() {
        parent::__construct();
       $this->load->library('session');
    }
	
	 public function index() {
		 $HASHING_METHOD = 'sha512'; // md5,sha1

// This response.php used to receive and validate response.
if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
	
$hashData = $_SESSION['SECRET_KEY'];
ksort($_POST);
foreach ($_POST as $key => $value){
	if (strlen($value) > 0 && $key != 'SecureHash') {
		$hashData .= '|'.$value;
	}
}
if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
	if($secureHash == $_POST['SecureHash']){
		
		if($_POST['ResponseCode'] == 0){
			// update response and the order's payment status as SUCCESS in to database
			
			//for demo purpose, its stored in session
			$_POST['paymentStatus'] = 'SUCCESS';
			$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
			
		} else {
			// update response and the order's payment status as FAILED in to database
			
			//for demo purpose, its stored in session
			$_POST['paymentStatus'] = 'FAILED';
			$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
		}
		// Redirect to confirm page with reference.
		$confirmData = array();
		$confirmData['PaymentID'] = $_POST['PaymentID'];
		$confirmData['Status'] = $_POST['paymentStatus'];
		$confirmData['Amount'] = $_POST['Amount'];
		
		$hashData = $_SESSION['SECRET_KEY'];

		ksort($confirmData);
		foreach ($confirmData as $key => $value){
			if (strlen($value) > 0) {
				$hashData .= '|'.$value;
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
		}
		$page = "";
		$this->load->view();
		
		
		
	 }
}*/