<?php 

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION["post-data"] = $_POST;

    extract($_POST);

    switch($request_type) {
        case "feedback":
            header("Location: ../mgbit feedback.php?requesttype=$request_type");
            break;
        case "support":
            header("Location: ../mgbit support.php?requesttype=$request_type");
            break;
        case "request":
            header("Location: ../mgbit request.php?requesttype=$request_type");
            break;
    }

}

?>