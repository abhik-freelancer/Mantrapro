<?php 
$HASHING_METHOD = 'sha512'; // md5,sha1
$ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

if(isset($data['secretkey'])){
	$secretkey = $data['secretkey'];
}
else{
	$secretkey = ''; //set your secretkey here
}

$hashData ='9198beab24537d04cb37bb7b2fc44f91';

unset($data['secretkey']);
unset($data['submitted']);

ksort($data);
foreach ($data as $key => $value){
	if (strlen($value) > 0) {
		$hashData .= '|'.$value;
	}
}
if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
}
?>
<html>
<body onLoad="document.payment.submit();">
<h3>Please wait, redirecting to process payment..</h3>
<form action="<?php echo $ACTION_URL;?>" name="payment" method="POST">
<?php
	
	foreach($data as $key => $value) {
?>
<input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
<?php
	}
?>
<input type="hidden" value="<?php echo $secureHash; ?>" name="secure_hash"/>
</form>
</body>
</html>


 



