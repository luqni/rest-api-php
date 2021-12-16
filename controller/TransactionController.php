<?php
require_once "../service/TransactionService.php";
$transaction = new TransactionService();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			{
				if(!empty($_GET["references_id"]) && !empty($_GET["merchant_id"])){
					$references_id=intval($_GET["references_id"]);
					$merchant_id=intval($_GET["merchant_id"]);

					$transaction->get_transaction($references_id, $merchant_id);
				}elseif(empty($_GET["references_id"]) && empty($_GET["merchant_id"])){
					$transaction->get_transactions();
				}else{
					header("HTTP/1.0 405 Method Not Allowed");
				}
			}
			break;
	case 'POST':
		{
			$transaction->insert_transactions();
		}		
		break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}


?>