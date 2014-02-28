<?php
include_once "FirebaseToken.php";
$secret = "ZO1GLnFkLV23FJR5CsIhN2TzzpW2205mUmIuMWhP";
$tokenGen = new Services_FirebaseTokenGenerator($secret);
$token = $tokenGen->createToken(array("id" => "1234" , "isModerator" => true));
  //$token = $tokenGen->createToken(null, array("admin" => true, "debug" => true));

  //echo $token;
  // Get data only readable by auth.id = "example".
  //$uri = "https://zonker-firebase.firebaseio.com/.json?auth=".$token;
  //var_dump(file_get_contents($uri));
echo $token;
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <script src="https://cdn.firebase.com/v0/firebase.js"></script>
  <script src="https://cdn.firebase.com/v0/firebase-simple-login.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

  <!-- Download from https://github.com/firebase/Firechat -->
  <link rel="stylesheet" href="../dist/0.1.3/firechat-default.min.css" />
  <script src="../dist/0.1.3/firechat-default.min.js"></script>
  <style>
  #firechat-wrapper {
    height: 475px;
    max-width: 325px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #fff;
    margin: 50px auto;
    text-align: center;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 5px 25px #666;
    -moz-box-shadow: 0 5px 25px #666;
    box-shadow: 0 5px 25px #666;
  }
  </style>
</head>

<!--
  Example: Anonymous Authentication

  This example uses Firebase Simple Login to create 'anonymous' user sessions in Firebase,
  meaning that user credentials are not required, though a user has a valid Firebase
  authentication token and security rules still apply.

  Requirements: in order to use this example with your own Firebase, you'll need to do the following:
    1. Apply the security rules at https://github.com/firebase/firechat/blob/master/rules.json
    2. Enable the 'Anonymous' authentication provider in Forge
    3. Update the URL below to reference your Firebase
    4. Update the room id for auto-entry with a public room you have created
  -->
  <body>
    <div id="firechat-wrapper"></div>
    <br/>
    <script type='text/javascript'>
    var chatRef = new Firebase("https://zonker-firebase.firebaseio.com/");

    // Log me in.
    var php_token = "<?php echo $token; ?>"; document.write(php_token);
    var chat = new FirechatUI(chatRef, document.getElementById("firechat-wrapper"));
    chatRef.auth(php_token, function(error,user) {    <!-- replacing AUTH_TOKEN by php_var -->
      if(error) {
        console.log("Login Failed!", error);
      }
      else if(user){
        console.log(user);
        console.log(user.id);
        chat.setUser(1234, 'akhil_display2');
        setTimeout(function() {
          chat._chat.enterRoom('-Iy1N3xs4kN8iALHV0QA');
        }, 500);
      }
      else {
        console.log("Login Succeeded!");
      }
    });

    //console.log("Auth_ID ",auth.id);

    
    document.write("\nHello\n");
    document.write("\nthere!!\n");
    </script>

  </body>
  </html>