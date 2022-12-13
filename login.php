<?php

include './components/header.php';

//A function to sanitise the data input into the form
if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;
    }
}

//Validate the data to ensure that it will be read correctly
$uname = validate($_POST['uname']);

$pass = validate($_POST['password']);

//Check user has been entered user side
if (empty($uname)) {

    header("Location: index.php?error=User Name is required");

    exit();
//Check password has been entered on user side
}else if(empty($pass)){

    header("Location: index.php?error=Password is required");

    exit();

}else{
    // If php is happy that both parts of data or input then send to server
    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['user_name'] === $uname && $row['password'] === $pass) {

            echo "Logged in!";

            $_SESSION['user_name'] = $row['user_name'];

            $_SESSION['name'] = $row['name'];

            $_SESSION['id'] = $row['id'];

            header("Location: http://localhost/photography-portfolio");

            exit();

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }else{

        header("Location: index.php?error=Incorect User name or password");

        exit();

    }

}


include './components/footer.php';
?>