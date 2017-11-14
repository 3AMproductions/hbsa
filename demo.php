<?

// Copyright 2005, Google Inc. All rights reserved.

require_once('nusoap.php');

/* 
 * This sample program illustrates how to get traffic estimates for keywords.
 * This program uses nusoap.php to handle the SOAP interactions.
 */

// Set up the authentication headers
$email = "<email>youremail@yourcompany.com</email>";
$password = "<password>yourpassword</password>";
$userAgent = "<useragent>YOURCOMPANY -- PHP Traffic Estimator Demo</useragent>";
$token = "<token>developer_token_here</token>";
$header = $email . $password . $userAgent . $token;

// Connect to the WSDL for the TrafficEstimatorService
$wsdl = "https://adwords.google.com/api/adwords/v2/TrafficEstimatorService?wsdl";
$client = new soapclient($wsdl, 'wsdl');

// Set the headers; they are needed for authentication
$client->setHeaders($header);

// With nusoap, you need to include XML with the parameters
$keyword0 = "<text>flowers</text>";
$keyword1 = "<text>chocolates</text>";
$otherinfo = "<maxCpc>50000</maxCpc><type>Broad</type>";

// Need to keep track of the order that we send in the keywords 
// so we can match them to the results
$keywordTextArray[0] = "flowers";
$keywordTextArray[1] = "chocolates";

$otherinfo = "<maxCpc>50000</maxCpc><type>Broad</type>";
$keywordxml = "<KeywordRequest> $keyword0 $otherinfo </KeywordRequest><KeywordRequest> $keyword1 $otherinfo</KeywordRequest>";

// Construct the XML string for the parameters
// It's a nusoap thing that the param string needs to include the operation name too
// Specifying the namespace is optional, AdWords API web services can use the default namespace
// $param = "<estimateKeywordList xmlns='https://adwords.google.com/api/adwords/v2'>" . $keywordxml . "</estimateKeywordList>";
$param = "<estimateKeywordList>" . $keywordxml . "</estimateKeywordList>";

// Make the request to estimate the keywords
$response = $client->call("estimateKeywordList", $param);
$response = $response['estimateKeywordListReturn'];

// If the headers hadn't been set already, you'd need to provide them in the call to call()
// $response = $client->call("estimateNewAdGroup", $param, false, false, $header);

// Handle any SOAP faults.
if ($client->fault) { 
	echo "<P>FAULT:  {$client->fault}<br>\n"; 
	echo "<P>Code: {$client->faultcode}<br>\n"; 
	echo "<P>String: {$client->faultstring}<br>\n";
	echo "<P>Detail: {$client->faultdetail}<br>\n";
	return;
} 

// If we got this far, $response contains the estimates
$count = count($response);
echo "<P>There are " . $count . " elements in the response array.<br>\n";

// A single  response is returned as an array of field values.
// Multiple responses are returned as an array of arrays.
if(is_array($response)) {
	echo "<P>We have an array of responses, need to iterate over them.<br>\n";
        $i = 0;

        while ($i < $count) {
        	// Need to get the keyword text out of $keywordTextArray
                // because the keywordEstimate doesn't know the keyword text
        	echo "<!-- keyword --><H3>" . $keywordTextArray[$i] . "</H3>";
        	printResults($response[$i]);
                $i++;
	}
}
else { 	// only a single response
    	// echo "<H3>ONE RESPONSE</H3>";
        // echo "<!-- keyword text--><H3>" . $thiskeyword . "</H3>";
        printResults($response);
}

function printResults ($estimate) {
	echo "<blockquote>";
	echo "\n<br>cpc = " . $estimate['cpc']; 
	echo "\n<br>clicks = " . $estimate['ctr'] * $estimate['impressions'];
	echo "\n<br>ctr = " . $estimate['ctr']; 
	echo "\n<br>impressions = " . $estimate['impressions'];
	echo "\n<br>notShown = " . $estimate['notShownPerDay'];
	echo "\n<br>position = " . $estimate['avgPosition'];
	echo "</blockquote><br>\n";
}
?>
