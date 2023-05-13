<!DOCTYPE html>
<html>

<head>
    <title>IT Department - Check Status</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <meta name="viewport" content="width=1, initial-scale=0.45">
</head>
<body>
    <form action="" method="post">
    <div class="form">
    <div class="form-title"></div>
    <h2>IT Department - Check Status</h2>
    <br>
    <p>Please enter your code to check the status. You can get your code by email after you have filled out the form.
    </p>
    <br>
    <p><a href="forms.php">Submit another response</a></p>
    <br>
    <p><a href="chk%20ID.php">You can also check by employee ID</a></p>

    <div class="name">
    <p>Code<font color="red"> *</font>
    </p><br>
    <input placeholder="Please enter your code here"
    type="text" maxlength="4"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"  name="id" required/>
    </div>

    <div class="next">
    <button type="submit">
        <font color="#673ab7">Next</font>
    </button>
    </div>
    </form>
<?php 
$conn = mysqli_connect("localhost", "root", "", "mgb");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql ="SELECT name, status FROM applications where id='$id'";
    $sqll = mysqli_query($conn, $sql);

    if(mysqli_num_rows($sqll)>0)
    {
        foreach($sqll as $row)
        { 
            switch($row['status']){
                  case 'In_Progress':
                    echo "Code: ";
                    echo str_pad(intval($id), 4, "0", STR_PAD_LEFT) ;
                    echo "<br> Your request is in progress.";
                  break;
                case 'Not_Applicable':
                    echo "Code: ";
                    echo str_pad(intval($id), 4, "0", STR_PAD_LEFT) ;
                    echo  "<br> Your request is not applicable.";
                  break;
                  case 'Completed':
                    echo "Code: ";
                    echo str_pad(intval($id), 4, "0", STR_PAD_LEFT) ;
                    echo  "<br> Your request is completed.";
                  break;
                default:
                echo "Code: ";
                echo str_pad(intval($id), 4, "0", STR_PAD_LEFT) ;
                echo  "<br> Your request is pending.";
                break;
              }        }
    }
    else
    {
        echo "Sorry, No record found for the entered code ";
        echo str_pad(intval($id), 4, "0", STR_PAD_LEFT) , ".";

    }
}

?>

    </body>
</html>

