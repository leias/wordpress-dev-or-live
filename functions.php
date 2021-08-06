// DEV OR LIVE? Set Authorize.net credentials accordingly
function getAuth($part) {
    if(ENVIRONMENT == 'dev') {
        if($part == 'auth_name') { $part = 'XXX'; }
        if($part == 'auth_key') { $part = 'YYY'; }
        if($part == 'auth_api') { $part = 'https://apitest.authorize.net/xml/v1/request.api'; }
    } else {
        if($part == 'auth_name') { $part = 'XXX'; }
        if($part == 'auth_key') { $part = 'YYY'; }
        if($part == 'auth_api') { $part = 'https://api.authorize.net/xml/v1/request.api'; }
    }
    return $part;
}

// Example of use in WooCommerce transaction
// Build XML
$xml  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
$xml .= "<createTransactionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">";	
$xml .= "<merchantAuthentication>";
$xml .= "<name>".getAuth('auth_name')."</name>";
$xml .= "<transactionKey>".getAuth('auth_key')."</transactionKey>";
$xml .= "</merchantAuthentication>";
$xml .= "<refId>".$order_id."</refId>";
$xml .= "<transactionRequest>";
$xml .= "<transactionType>priorAuthCaptureTransaction</transactionType>";
$xml .= "<amount>".$order->order_total."</amount>";
$xml .= "<refTransId>".$transactionID."</refTransId>";
$xml .= "</transactionRequest>";
$xml .= "</createTransactionRequest>";

// Example of use in wp_remote_post
// Process request	
$response = wp_remote_post( 
    getAuth('auth_api'),  array(
        'method' => 'POST',
        'timeout' => 70,
        'redirection' => 5,
        'httpversion' => '1.0',
        'headers' => array(
            'Content-Type' => 'text/xml'
        ),
        'body' => $xml,
        'sslverify' => false
    )
);		
