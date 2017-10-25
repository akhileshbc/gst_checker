<?php
/*
	===================================================================================================================================
	GST Checker
	---------------------------------
	When GST was first introduced, many businesses/dealers were misusing it by collecting extra amount from the customers by providing fake GST id in their invoices.
	And some are still doing it! It's hard for the public to verify whether a GST number printed on the invoices were valid or not.
	And recently, Kerala government has introduced a mobile app called "Kerala GST" : https://play.google.com/store/apps/details?id=nic.kerala.gst.apublic.gst_public&hl=en
	So this function is based on it. 
	
	Hope this will help someone!
			
	You could use this function in your free/commercial projects.
	
	By,
		Akhilesh.B.Chandran
		
		Email: 		abcthedeveloper@gmail.com
		Facebook: 	www.facebook.com/akhileshbc
		Website:	www.akhileshbc.com
	===================================================================================================================================
*/	

	/*	@function name 	- checkGSTid() 
	*	@parameters 	- 
	*					 |	$id 			-- GST id of the dealer/business
	*	@return			- 
	*					 |	FALSE, if not successful in fetching the details
	*					 |	associative array, containing the details if successful
	*/
	
	function checkGSTid( $id )
	{
		//--- API url
		$url = "http://61.0.248.109:8080/api/public/gstin/" . $id;
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST => FALSE
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		
		if($resp === false)
			return false;
		else{	
		
			$resp = json_decode($resp, true );
			if( $resp['status_cd'] == 0 )
				return array('status' => 'error', 'msg' => $resp['error']['message'] );
			elseif( $resp['status_cd'] == 1 )	
			{
				$data = base64_decode( $resp['data'] );
				$data_json = json_decode( $data, true );
				
				$output = array(
					'status' 			=> 'success',
					'dealer_name' 		=> $data_json['bsnm'],
					'can_collect_gst'	=> ( $data_json['isopcmp'] == 'R' ) ? true : false,
					'msg'				=> ''
				);
				
				if( $data_json['isopcmp'] == 'O' )
					$output['msg'] = "This dealer is NOT ALLOWED to collect GST, as they are registered under composition scheme of GST!";
				elseif( $data_json['isopcmp'] == 'R' )
					$output['msg'] = "This dealer CAN COLLECT GST, as they are registered under normal scheme of GST!";
				else
				{
					$output['msg'] = "Unknown details..";
				}	
				
				return $output;
			}
			else
				return false;
		}			
	}
	
?>

