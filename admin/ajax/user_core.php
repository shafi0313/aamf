<?php 
  include '../../includes/config.php';

      if(isset($_POST['username'])){
        $query1 = mysqli_query($cont, "SELECT * FROM user WHERE username = '".$_POST['username']."'");
        if(mysqli_num_rows($query1) > 0){
            echo '<span class="text-danger">username al</span>';
        }
    }else{
        echo '<span class="text-success">username</span>';
    };

      // $username       = $_POST['username'];
      // $email          = $_POST['email'];
      // $password       = $_POST['password'];
      // $name           = $_POST['name'];
    extract($_POST);
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])){
      $encryptedPass  = md5(sha1($password));
      $authToken      = md5(sha1($password.$email));
      $role           = '1';

      $query = "INSERT INTO users (name,username,role,email,password,auth,createDate) ";
      $query .= "VALUES('$name','$username','$role','$email','$encryptedPass','$authToken',NOW())";
      $runQuery = mysqli_query($cont, $query);

      function v($post)
      {
          $post = trim($post);
          $post = stripcslashes($post);
          $post = htmlspecialchars($post);
          return $post;
      };
    };

  

    // if(isset($_POST['readData'])){
        // $html = '';
        // $html .= '<thead>';
        // $html .= '  <tr>';
        // $html .= '      <th>sn</th>';
        // $html .= '      <th>name</th>';
        // $html .= '      <th>namename</th>';
        // $html .= '      <th>role</th>';
        // $html .= '      <th>Actions</th>';
        // $html .= '  </tr>';
        // $html .= '</thead>';

        // $sn = 1;
        // $query = mysqli_query($cont, "SELECT * FROM user");
        // if (mysqli_num_rows($query)) {
        //     while ($row = mysqli_fetch_assoc($query)) {
        //         // $html .= '<tbody';
        //         $html .= '    <tr>';
        //         $html .= '        <th>'.$sn++.'</th>';
        //         $html .= '        <th>'.$row['name'].'</th>';
        //         $html .= '        <th>'.$row['namename'].'</th>';
        //         $html .= '        <th>'.$row['role'].'</th>';
        //         $html .= '        <th>Actions</th>';
        //         $html .= '    </tr>';
        //         // $html .= '</tbody>';
        //     }

        //     echo json_encode(['status' => 'success', 'data' => $html]);
        // }else {
        //     $html = '<h1 class="display-1 text-danger text-center text-bolder">SORRY! </h1>';
        //     echo json_encode(['status' => 'error', 'data' => $html]);
        // }

    // }


 ?>