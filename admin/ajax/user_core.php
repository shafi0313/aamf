<?php 
  include '../../includes/config.php';



  // if (isset($_POST['save'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $encryptedPass  = md5(sha1($password));
    $authToken      = md5(sha1($password.$email));
    $role           = '1';

    $query = "INSERT INTO users (name,username,role,email,password,auth,createDate) ";
    $query .= "VALUES('$name','$username','$role','$email','$encryptedPass','$authToken',NOW())";
    $runQuery = mysqli_query($cont, $query);
    // var_dump($query);

    // if($runQuery == true){
      // header("location: login.php?done=Registration Success!!");
    // } else{
    //     echo "Plz Check Your Information";
    // }

    // function v($post){
    //   $post = trim($post);
    //   $post = stripcslashes($post);
    //   $post = htmlspecialchars($post); 
          
    //     return $post;
// }



    // if(isset($_POST['readData'])){
        $html = '';
        $html .= '<thead>';
        $html .= '  <tr>';
        $html .= '      <th>name</th>';
        $html .= '      <th>namename</th>';
        $html .= '      <th>role</th>';
        $html .= '      <th>Actions</th>';
        $html .= '  </tr>';
        $html .= '</thead>';

        $query = mysqli_query($cont, "SELECT * FROM user");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                $html .= '    <tr>';
                $html .= '        <th>'.$row['name'].'</th>';
                $html .= '        <th>'.$row['namename'].'</th>';
                $html .= '        <th>'.$row['role'].'</th>';
                $html .= '        <th>Actions</th>';
                $html .= '    </tr>';
            }
            var_dump($row['name']);
        }

    // }
 ?>