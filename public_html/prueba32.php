<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


            
            if(isset($_POST["company"]))
            {
                //$producto = $_POST["producto"];
                $a1 = $_POST["company"];
                
                $b1 = $_POST["first_name"];
                $b2 = $_POST["last_name"];
                $b3 = $_POST["company"];
                $b4 = $_POST["title"];
                $b5 = $_POST["email"];
                $b6 = $_POST["phone"];
                
                $ipo = getRealIpAddr();
                
                
                
                
                $oid = "00D6A000002kXht";
                $retURL = "https://www.acreditta.com/gracias";
                $lead_source = "Web";
                $Type__c = "Inbound";
                
                $url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8";
                
                $ch = curl_init($url);
                
                 
                
                $parametros = "first_name=$b1&last_name=$b2&company=$b3&title=$b4&email=$b5&phone=$b6&oid=$oid&retURL=$retURL&lead_source=$lead_source&Type__c=$Type__c&description=$ipo";
                
                curl_setopt($ch, CURLOPT_POST, 1);
                
                
                
                curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
                
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 80);
                
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
         
            
                
                $resultado = curl_exec($ch);
                
             echo 'Curl error: ' . curl_error($ch);
                
                curl_close($ch);
                
            }
            
            
            if(isset($resultado))
            {
                echo $resultado;
            }
            
            
            
  function getRealIpAddr()
{
   //whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
return $ip_address;

}
