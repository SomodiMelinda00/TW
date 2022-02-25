<?php
  
  // If admin wants to modidy name, display Change Name Layout and store new name;
  if(isset($_POST['new-admin-name'])){
      require 'Includes-inc/check-identity-inc.php';
      $_SESSION['new-name'] = $_POST['new-admin-name'];
  }

  // If admin wants to modidy email, display Change Email Layout and store new email;

  else if(isset($_POST['new-admin-email'])){
      require 'Includes-inc/check-identity-inc.php';
      $_SESSION['new-email'] = $_POST['new-admin-email'];
  }

  // If admin wants to modify password, display Change Pass Layout and store new password (only if new password and confirmed new password match);

  else if(isset($_POST['new-admin-pass'])){
      
      if($_POST['new-admin-pass']==$_POST['confirmed-new-admin-pass']){
        require 'Includes-inc/check-identity-inc.php';
        $_SESSION['new-pass'] = $_POST['new-admin-pass'];
    } else
        echo "Passwords do not match!";
      
  }

  // If we arrived on Check Identity Page:

  else if(isset($_POST['confirm'])){

        // If Admin Changes Name:

        if($_SESSION['new-name']){

          require 'database.php';

          $ID = $_SESSION['adminId'];
          $new_name = $_SESSION['new-name'];

          $sql = "SELECT * FROM admins WHERE ID = ?";
          $sql_update = "UPDATE admins SET nume='" . $new_name . "' WHERE ID=" . $ID;

          $stmt = mysqli_stmt_init($connection);

          if(!mysqli_stmt_prepare($stmt, $sql))
              echo "SQL Error!";
          else {
              mysqli_stmt_bind_param($stmt, "s", $ID);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result);

              if($row){

                // Verify Creditentials Before Commiting Change:
                if($row['email'] == $_POST['confirmation-email'] and $row['parola'] == $_POST['confirmation-password'])
                  if(mysqli_query($connection, $sql_update)){
                    header("Location: ?setari-admin=true&updated-name=success");
                    $_SESSION['adminName'] = $new_name;
                  }
                  else
                    echo "There was an error! We couldn't update your name.";
                else
                  echo "Wrong Creditentials!";

              }
              else
                echo "Something is wrong!";

          } 

          // Reset New-name variable (maybe admin wants to change something else during current session and only one of new-name, new-email and new-pass must be set, not two or three)           

          $_SESSION['new-name'] = null;
        }


        // If Admin Changes Email:


        else if($_SESSION['new-email']){

          require 'database.php';

          $ID = $_SESSION['adminId'];
          $new_email = $_SESSION['new-email'];

          $sql = "SELECT * FROM admins WHERE ID = ?";
          $sql_update = "UPDATE admins SET email='" . $new_email . "' WHERE ID=" . $ID;

          $stmt = mysqli_stmt_init($connection);

          if(!mysqli_stmt_prepare($stmt, $sql))
              echo "SQL Error!";
          else {
              mysqli_stmt_bind_param($stmt, "s", $ID);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result);

              if($row){

                if($row['email'] == $_POST['confirmation-email'] and $row['parola'] == $_POST['confirmation-password'])
                  if(mysqli_query($connection, $sql_update)){
                    header("Location: ?setari-admin=true&updated-email=success");
                    $_SESSION['adminEmail'] = $new_email;
                  }
                  else
                    echo "There was an error! We couldn't update your email.";
                else
                  echo "Wrong Creditentials!";

              }
              else
                echo "Something is wrong!";

          }

          // Reset New-email variable (maybe admin wants to change something else during current session and only one of new-name, new-email and new-pass must be set, not two or three)              


          $_SESSION['new-email'] = null;
        }

        // If Admin Changes Password:


        else if($_SESSION['new-pass']){
          

          require 'database.php';

          $ID = $_SESSION['adminId'];
          $new_pass = $_SESSION['new-pass'];

          $sql = "SELECT * FROM admins WHERE ID = ?";
          $sql_update = "UPDATE admins SET parola='" . $new_pass . "' WHERE ID=" . $ID;

          $stmt = mysqli_stmt_init($connection);

          if(!mysqli_stmt_prepare($stmt, $sql))
              echo "SQL Error!";
          else {
              mysqli_stmt_bind_param($stmt, "s", $ID);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result);

              if($row){

                if($row['email'] == $_POST['confirmation-email'] and $row['parola'] == $_POST['confirmation-password'])
                  if(mysqli_query($connection, $sql_update)){
                    header("Location: ?setari-admin=true&updated-password=success");
                    $_SESSION['adminEmail'] = $new_email;
                  }
                  else
                    echo "There was an error! We couldn't update your password.";
                else
                  echo "Wrong Creditentials!";

              }
              else
                echo "Something is wrong!";

          }            

          // Reset New-pass variable (maybe admin wants to change something else during current session and only one of new-name, new-email and new-pass must be set, not two or three)  

          $_SESSION['new-pass'] = null;
        }

  }

  // If refreshed or something unexpected:
  else
    echo "Go back!";

?>

