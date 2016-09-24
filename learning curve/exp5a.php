<?php
 
//create array of data to be posted
$post_data['regno'] = 7660281;
$post_data['B1'] = 'submit';
 
//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . $value;
}
 
//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);
 
//create cURL connection
$curl_connection = curl_init('http://cbseresults.nic.in/class12/cbse122013.asp');
 
//set options
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
 
//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
 
//perform our request
$result = curl_exec($curl_connection);
print $result;
 
//show information regarding the request
print_r(curl_getinfo($curl_connection));
echo curl_errno($curl_connection) . '-' . curl_error($curl_connection);
 
//close the connection
curl_close($curl_connection);
 
?>