<?php
  session_start();

  $old_user = $HTTP_SESSION_VARS['valid_user'];  // store  to test if they *were* logged in
   
  unset($HTTP_SESSION_VARS['valid_user']);
  unset($HTTP_SESSION_VARS['fullname']);
  unset($HTTP_SESSION_VARS['isadmin']);
  unset($HTTP_SESSION_VARS['id']);  
  
  session_destroy();
  echo "<script>window.location.href='login.php?ermsg=You are logged out successfuly'</script>";


?>
<html>
<body>
<h1>
  <?php 
  if (!empty($old_user))
  {
    
  }
  else
  {
     //if they weren't logged in but came to this page somehow
    echo 'You were not logged in, and so have not been logged out.<br />'; 
  }
?>
</h1>
</body>
//</html>