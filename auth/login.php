<?php require "../config/config.php"   ?>
<?php require "../includes/header.php";   ?>
<?php
if (isset($_POST['submit'])) {
    if ($_POST['email'] == '' || $_POST['password'] == '') {
        echo "Please fill in all fields.";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->FETCH(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: ../index.php");
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "User not found.";
        }
    }
}
?>

               <form method="POST" action="login.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>


<?php require "../includes/footer.php";   ?>

