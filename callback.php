<?php
require('post.php');

$confirmations = 3;
$callback = urlencode("http://www.random.me/pingpong.php?user=1");
$fee = "low";

$rules = [
   array('address'=>'18fRLYWVMfQcVF2MpwYnvwmf4H9H2sPVov', 'qouta'=> 15),
   array('address'=>'39cjjxHTu7344mXExKb5SoDzbAoDWBpCj9', 'qouta'=> 20),
   array('address'=>'1TipsnxGEhPwNxhAwKouhHgTUnmmuYg9P', 'qouta'=> 65)
];
      
$postfields = json_encode(array('type'=>"payment_distribution", 'payment_distribution'=> $rules ));
$data = post_api("https://noxx.io/api.php". $callback . "?conf=" . $confirmations . "&fee=" . $fee, $postfields);
      
$respond = json_decode($data,true);
$address = $respond["address"]; // Bitcoin address to receive payments
$payment_code = $respond["payment_code"]; //Payment Code
$invoice = $respond["invoice"]; // Invoice to view payments and transactions
