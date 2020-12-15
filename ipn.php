<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: skrill-ipn
 * Date: 06.12.2016
 * Time: 17:21
 * All rights and copyrights are owned by Sevio Solutions®
 
 -----------------------------
 UPDATE
 -----------------------------
 EDITED BY: SHREYANSH KASHYAP
 EDITED ON: 15th DEC, 2020
 EDITOR'S EMAIL: JHAJINAMASTE@GMAIL.COM
 
 REASON FOR MODIFICATION: While integrating I found out some mistakes in the code which was needed to be corrected. It is now working great as of mentioned date above.
 */

define("SKRILL_SECRET_WORD", strtoupper(md5("skrill")));

$transactionPayEmail = $_POST['pay_to_email'];
$transactionPayFromEmail = $_POST['pay_from_email'];
$transactionMerchantId = $_POST['merchant_id'];
$transactionMbtxn_id = $_POST['mb_transaction_id'];
$transactionMbAmount = $_POST['mb_amount'];
$transactionMbCurrency = $_POST['mb_currency'];
$transactionStatus = $_POST['status'];
$transactionMd5sig = $_POST['md5sig'];

// Following details are the original details submitted using the form
$amount = $_POST['amount'];
$currency_code = $_POST['currency'];
$userId = $_POST['Field1'];
$txn_id = $_POST['transaction_id'];

$md5signature = $transactionMerchantId . $txn_id . SKRILL_SECRET_WORD . $transactionMbAmount . $transactionMbCurrency . $transactionStatus;

if(strtoupper(md5($md5signature)) == $transactionMd5sig){
  if($transactionStatus == 2){
    // Transaction successful. You may now update the database.
  }else{
    // Transaction is unsuccessful. You may log the details.
  }
}else{
  // Verification Signature Mismatch!
}
?>
