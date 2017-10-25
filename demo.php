<?php
	// --------------------------------------
	// DEMO Code on how to use this function!
	// --------------------------------------
	

	include 'gst_checker.php';	// this file needs to be included.
	
	
	//------------------------------------------------------------------------------------------------------------------
	/*
	*  @paramter 		- GST id of the business/dealer
	*  @return values 	- array with the details
	*
	*  eg: $details = checkGSTid('xxxxxxx');
	*
	*  		echo $details['status'];    		--> "success" or "error"
	*		echo $details['dealer_name']; 		--> name of the dealer/business registered under the GST
	*		echo $details['can_collect_gst'];  	--> true or false
	*		echo $details['msg'];    			--> if "status" is "error", then the error message. Otherwise, a text describing whether the dealer/business is allowed to collect the tax or not
	*/
	
	
	$details = checkGSTid( '32ABFFA5929G1ZM' ); //pass the GST number
	if( $details !== false )	// check whether we were successfully able to fetch the data
	{
		var_dump( $details );
	}
	
	
	
	//------------------------------------------------------------------------------------------------------------------
?>