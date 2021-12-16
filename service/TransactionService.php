<?php
require_once "../phinx.php";
require_once "../model/Transaction.php";

class TransactionService 
{
	// private $db_table = "transactions";

	public  function get_transactions()
	{
		$transaction = new Transaction();
		global $mysqli;
		$query="SELECT * FROM " . $transaction->db_table . "";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
			'status' => 1,
			'message' =>'Get List Transaction Successfully.',
			'data' => $data
		);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function insert_transactions()
	{
		$transaction = new Transaction();
		global $mysqli;
		$arrcheckpost = array('invoice_id' => '', 'item_name' => '', 'amount' => '', 'payment_type' => '', 'customer_name'   => '', 'merchant_id'   => '');
		$hitung = count(array_intersect_key($_POST, $arrcheckpost));
		if($hitung == count($arrcheckpost)){

				$invoice_id     = $_POST['invoice_id'];
				$item_name    = $_POST['item_name'];
				$amount    = $_POST['amount'];

				if($_POST['payment_type'] == 'virtual_account'){
					$number_va = rand(1, 1000000);
				}else{
					$number_va = $_POST['payment_type'];
				}

				$payment_type     = $_POST['payment_type'];
				$customer_name    = $_POST['customer_name'];
				$merchant_id    = $_POST['merchant_id'];
				$status = "Pending";
				$references_id = rand(1, 10);

				$query = "INSERT INTO transactions 
				(invoice_id, item_name, amount, payment_type, customer_name, merchant_id, number_va, status, references_id)
				  VALUES ('$invoice_id', '$item_name', '$amount', '$payment_type', '$customer_name', '$merchant_id', '$number_va', '$status', '$references_id')";
				$result = mysqli_query($mysqli, $query);
				
				
				if($result)
				{
					$response=array(
						'references_id' => $references_id,
						'number_va' => $number_va,
						'status' => $status
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>'Transaction Addition Failed.'
					);
				}
		}else{
			$response=array(
						'status' => 0,
						'message' =>'Parameter Do Not Match'
					);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_transaction($references_id=0, $merchant_id=0)
	{
		
		if($references_id != 0 && $merchant_id != 0)
		{
			$transaction = new Transaction();
			global $mysqli;
			$query="SELECT * FROM " . $transaction->db_table . "";
			$query.=" WHERE references_id=".$references_id." AND ".$merchant_id." LIMIT 1";
			$data=array();
			$result=$mysqli->query($query);
			while($row=mysqli_fetch_object($result))
			{
				$references_id = $row->references_id;
				$invoice_id = $row->invoice_id;
				$status = $row->status;
			}
			$response=array(
				'references_id' => $references_id,
				'invoice_id' =>$invoice_id,
				'status' => $status
			);
		}else{
			$response=array(
				'status' => 0,
				'message' =>'Parameter Do Not Match'
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}
}

 ?>