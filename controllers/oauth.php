<?php
//Google API PHP Library includes
include('api/src/Google/Client.php');
include('api/src/Google/Service/Oauth2.php');

// Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
 $client_id = '307523365750-8teciudj7femi3knrbsgnr2rjbe3tl6k.apps.googleusercontent.com';
 $client_secret = 'xvd7z0z8M0vZpWcTJRM_Ihsl';
 $simple_api_key = 'AIzaSyCRfu2993lZ6nqaFQf_cyLki1WeEIr4Ehw';
 $redirect_uri = 'http://localhost/diginew/home.php';
 
//Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$objOAuthService = new Google_Service_Oauth2($client);


//Send Client Request



//Authenticate code from Google OAuth Flow
//Add Access Token to Session
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
//Logout
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  $client->revokeToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
}

//Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
}


//if we got the access token now we can retrive data that we got from Google 
if ($client->getAccessToken()) 
{
      $userData = $objOAuthService->userinfo->get();
      $event = $db->getId($userData->email); //Checks Whether user Exists in The Database
      if(!$event)
      {
        $db->insertUser($userData); //If new User Then It inserts the details of user in DB
        if(mysqli_affected_rows($db->conn)!=1) 
        { 
          echo "Error";
        }
      }
      
}
else //if access token is not found tben create OAuth URL to redirect user to Get one.
{
    $authUrl = $client->createAuthUrl();
}
?>