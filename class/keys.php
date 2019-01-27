<?php
class ODCU_library{
    private $userName = "146";
    private $password = "1215c8e99fe409b8e9f774e694542cbc";
    private $baseURL = "https://opendata.concordia.ca/API/v1/course/";
    function query($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HEADER => 0,
        CURLOPT_USERPWD => $this->userName . ":" . $this->password
       
       
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            var_dump($err);
            return false;
        } else {
            return $response;
        }
    } //function query(){





}
    $endpoint = new ODCU_library();
    echo $endpoint->getID();
?>