<?php
$servername = "127.0.0.1";
$username = "pma";
$pass = "pmapass";
$database = "${}";

// Function to handle database connection
function DB_manager($usernames, $password, $PHP_SESSID) {
    global $servername, $username, $pass, $database;

    // Create connection
    $conn = new mysqli($servername, $username, $pass, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully <br>";

    // SQL query to insert values into the table
    $sql = "INSERT INTO users (usernames, password, PHP_SESSID) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usernames, $password, $PHP_SESSID);

    if ($stmt->execute()) {
        echo "Should be inserted into the DB <br>";
        header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Function to retrieve values based on credentials
function GET_VALUES($name,$hash) {
    global $servername, $username, $pass, $database;

    // Create connection
    $conn = new mysqli($servername, $username, $pass, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve user
    $sql = "SELECT * FROM users WHERE usernames = ? AND PHP_SESSID = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ss", $name, $hash);

        // Execute query
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if the query returned any rows
            if ($result->num_rows > 0) {
                echo "Values should be present";
                header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']) . "?haha=camp");
                exit;
            } else {
                echo "No matching records found. <br>";
                header("Location: logout.php");
                exit;
            }
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

    // Close connection
    $conn->close();
} ?>

<?php function LOGIN_CHECK($name, $user_pass) {
    global $servername, $username, $pass, $database;

    // Create connection
    $conn = new mysqli($servername, $username, $pass, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve user
    $sql = "SELECT * FROM users WHERE usernames = ? AND password = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ss", $name, $user_pass);

        // Execute query
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if the query returned any rows
            if ($result->num_rows > 0) {
                echo "You have successfully logged in";
                header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']) . "?haha=camp");
                exit;
            } else {
                echo "No matching records found. <br>";
                header("Location: logout.php");
                exit;
            }
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
