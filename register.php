
<!DOCTYPE html>
<html lang="en">
<body>
    <form action="register.php" method="post">
        Name: <input type="text" name="user"><br>
        Pass: <input type="password" name="pass"><br>
        <input type="submit" name="done"><br>
    </form>

    <?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $User = $_POST['user'];
        $Pass = $_POST['pass'];
        
        //Starting a session
        session_start();
        $Session = session_id();

        //Sending the Values to the DB
        include("db.php");
        DB_manager($User, $Pass, $Session);


        // Set cookies with fixed names
        setcookie('user', $User, time() + (86400 * 30), "/");

        GET_VALUES($User, $Session);
        header("Location: register.php");

        }

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        echo "<a href=\"test.php\">hola</a>";
        
        }

    ?>

</body>
</html>
