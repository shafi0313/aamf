<?php
    include '../includes/config.php';
?>
<?php 
    $name           = mysqli_real_escape_string($_POST['name']);    
    $username       = mysqli_real_escape_string($_POST['username']);    
    $email          = mysqli_real_escape_string($_POST['email']);    
    $password       = mysqli_real_escape_string($_POST['password']);
    $name           = v($_POST['name']);
    $username       = v($_POST['username']);   
    $email          = v($_POST['email']); 
    $password       = v($_POST['password']);    
    $encryptedPass  = md5(sha1($password));
    $authToken      = md5(sha1($password.$email));
    $role           = '0';

    $query = "INSERT INTO users (name,username,role,email,password,auth,createDate) ";
    $query .= "VALUES('$name','$username','$role','$email','$encryptedPass','$authToken',NOW())";
    $runQuery = mysqli_query($cont, $query);
    // var_dump($query);

    if($runQuery == true){
      header("location: login.php?done=Registration Success!!");
    } else{
        echo "Plz Check Your Information";
    }

    function v($post){
      $post = trim($post);
      $post = stripcslashes($post);
      $post = htmlspecialchars($post); 
          
        return $post;
    }

  ?>