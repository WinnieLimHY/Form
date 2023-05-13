<?php

session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);
    extract($_SESSION["post-data"]);

    $target_dir = "../assets/documents/";
    $countfiles = count($_FILES['files']['name']);

    $files = array();
    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['files']['name'][$i];
        $target_file = $target_dir . basename($_FILES["files"]["name"][$i]);

        array_push($files, $target_file);

        move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file);
    }

    $documents = implode(", ", $files);

    switch ($request_type) {
        case "feedback":
            $sql = "INSERT INTO applications (email_address, name,employee_ID, department, request_type, feedback_description, feedback_documents_or_images)
            VALUES ('$email_address', '$name', '$employee_ID','$department', '$request_type', '$feedback_description', '$documents')";
            break;
        case "support":
            $sql = "INSERT INTO applications (email_address, name,employee_ID, department, request_type, software_hardware_description, software_hardware_screenshot)
            VALUES ('$email_address', '$name', '$employee_ID','$department', '$request_type', '$software_hardware_description', '$documents')";
            break;
        case "request":
            if (!empty($_POST["requests"])) {
                $requests = $_POST["requests"]; 

                $other = $_POST["other"];

                if (!empty($other)) {
                    $requests[] = $other;
                }
                $software_hardware_accessories = implode(", ", $requests);

            }


            $sql = "INSERT INTO applications (email_address, name,employee_ID, department, request_type, requisition_approved_form, software_hardware_accessories, requirement_date, is_existing_vendor_or_is_web_link_of_the_item)
            VALUES ('$email_address', '$name', '$employee_ID', '$department','$request_type', '$documents', '$software_hardware_accessories', '$requirement_date', '$is_existing_vendor_or_is_web_link_of_the_item')";
    }

    if (!mysqli_query($conn, $sql)) {
        echo "<script>alert('Submit Form Failed'); window.history.go(-1);</script>";
        exit();
    } else {
        $response_id = $conn->insert_id;
        header("Location: ../submitpage.php?id=$response_id");
        //
        $id = $_POST['id'];
        $sql ="SELECT email_address FROM applications where id='$response_id'";
        // 
        $localIP = getHostByName(php_uname('n'));
        $idd= str_pad(intval($response_id), 4, "0", STR_PAD_LEFT);
        $receiver = "$email_address";
        $subject = "IT Department";
        $message = "
        Thank for filling in IT Department - Feedback / Support / Request Forms 
        Your code is $idd. 
        You can check your request status at the following URL: 
        https://$localIP/form/chk%20code.php
        ";
        $sender = "From:winnielimovo@gmail.com";
        mail($receiver, $subject, $message, $sender);
        //
        $receiver = "winnielimovo@gmail.com";
        $subject = "IT Department";
        $message = "
        Hi,
        Your form IT Department - Feedback / Support / Request Forms has a new response.
         https://$localIP/form/homepage.php

        Responder: $email_address
        ";
        $sender = "From:winnielimovo@gmail.com";
        mail($receiver, $subject, $message, $sender);
   }
}
