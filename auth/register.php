<?php require "../config/config.php"   ?>
<?php require "../includes/header.php";   ?>

<?php
if (isset($_POST['submit'])) {
    if ($_POST['email'] == '' || $_POST['username'] == '' ||
        $_POST['password'] == '') {
        echo "Please fill in all fields.";
    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, username, password) 
                VALUES (:email, :username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        header("Location: login.php");

        echo "User registered successfully.";
    }
}
?>


<form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require "../includes/footer.php";   ?>
