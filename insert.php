<?php
//In this first create all variable by post method
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$token = $_POST['token'];
$action = $_POST['action'];
//Here use curl method for Api integration whith Google Recaptcha
$curlData = array(
  'secret'  => 'Secret Key',
  'response'  => $token
);
//The main method for curl integaration with Api
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curlResponse = curl_exec($ch);

$captchaResponse = json_decode($curlResponse, true);
//Here use concept if catcha reponse is 1 then human and if equal to 0.5 or less the robot
if($captchaResponse['success'] == '1' 
  && $captchaResponse['action'] == $action 
  && $captchaResponse['score'] >= 0.5 
  && $captchaResponse['hostname'] ==  $_SERVER['SERVER_NAME'])
{
  echo 'Form Submitted Successfully';
}
else{
  echo 'You are not a human';
}