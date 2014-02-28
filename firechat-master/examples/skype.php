<?php
require("common.php");
if(empty($_SESSION['user']))
{
  header("Location: login.php");
  die("Redirecting to login.php");
}
?>
<!doctype html>
<html>
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, secret content!<br />
<a href="memberlist.php">Memberlist</a><br />
<a href="edit_account.php">Edit Account</a><br />
<a href="logout.php">Logout</a>

<head>
 <script type="text/javascript" src="http://cdn.dev.skype.com/uri/skype-uri.js"></script>
</head>
<body>
  <div id="genSkypeCall">
    <script type="text/javascript">
    Skype.ui({
      name: "call",
      element: "genSkypeCall",
      participants: ["akhil.jindal12"],
      listParticipants: "true"
    });
    </script>
  </div>
</body>
</html>