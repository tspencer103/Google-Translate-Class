<?php

class GoogleTranslate
{
    
    public function __construct($api_key = "thekey")
    {
        
        $this->api_key = $api_key;
    }
    
    public function translate($text, $source, $target)
    {
        /* construct the url to retrieve JSON data */
        $url = 'https://www.googleapis.com/language/translate/v2?key=' . $this->api_key . '&q=' . rawurlencode($text) . '&target=' . $target . '&source=' . $source;
 
	/* Use curl to process request and get response */     
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response        = curl_exec($handle);
        
        /* Decode the JSON data */
        $responseDecoded = json_decode($response, true);
        
        /* Get response code, hopefully 200 which means success */
        $responseCode    = curl_getinfo($handle, CURLINFO_HTTP_CODE); 
        curl_close($handle);
        
        /* Handle errors if response codeis not 200 */
        if ($responseCode != 200) {
            return 'Error code: ' . $responseCode . ' (' . $responseDecoded['error']['errors'][0]['message'] . ')';
        } else {
            return $responseDecoded['data']['translations'][0]['translatedText'];
        }
    }
}

?>