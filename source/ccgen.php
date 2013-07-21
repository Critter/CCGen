<?php
	require_once('workflows.php');
	require_once('gencc.php');

	$w = new Workflows();

	$query = urlencode( $argv[1] );
	$text = "";
	$howmany = 8;

	
	$result = array();

	/*
	if ( strlen( $query ) < 2 ):
		exit(1);
	endif;
	*/
	
	switch ($query) {
		case 'mc':
			//echo "we are in mc";
				$result = credit_card_number($mastercardPrefixList, 16, $howmany);
				$text = "Mastercard";
				
			break;
		case 'visa':
				$result = credit_card_number($visaPrefixList, 16, $howmany);
				$text = "Visa";
			break;
		case 'discover':
				$result = credit_card_number($discoverPrefixList,16, $howmany);
				$text = "Discover";
			break;
		case 'amex':
				$result = credit_card_number($amexPrefixList, 15, $howmany);
				$text = "American Express";
			break;
		default:
			
			break;
	}


	//foreach( $suggestions->RESULTS as $suggest ):
	
	foreach ($result as $key => $value) {
		$w->result( '$suggest->l', $value, $value, 'Card: '. $text, 'icon.png' );	
	}
	
	echo $w->toxml();
	/*
	if ( strlen( $query ) < 3 ):
		exit(1);
	endif;
	*/


























?>