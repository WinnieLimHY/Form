<!DOCTYPE html>
<html>

<head>
    <title>
       IT Department - Check Status
    </title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=1, initial-scale=0.45">
  <link rel="stylesheet" type="text/css" href="CSS.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #ede9f4;
  }
    </style>
</head>
<body>
    <form action="" method="post">
    <div class="form">
    <div class="form-title"></div>
    <h2>IT Department - Check Status</h2>
    <br>
    <p>Please enter your employee ID to check your previous request. 
    </p>
    <p><a href="forms.php">Submit another response</a></p>

    <div class="name">
    <p>Code<font color="red"> *</font>
    </p><br>
    <input placeholder="Please enter your code here"
    type="text" maxlength="6"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"  name="employee_ID" required/>
    </div>

    <div class="next">
    <button type="submit">
        <font color="#673ab7">Next</font>
    </button>
    </div>
    </form>
<?php 
$conn = mysqli_connect("localhost", "root", "", "mgb");

if(isset($_POST['employee_ID'])){
    $employee_ID = $_POST['employee_ID'];
    $sql ="SELECT id, created_at, employee_ID,request_type, status FROM applications where employee_ID='$employee_ID'";
    $sqll = mysqli_query($conn, $sql);

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Employee: ", str_pad(intval($employee_ID), 6, "0", STR_PAD_LEFT) ;
        ?>
                <br>
                <br>

        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Request_Type</th>
            <th scope="col">Created_At</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>";
        echo $row["id"];
        echo "</td><td>";
        echo $row["request_type"];
        echo "</td><td>";
        echo $row["created_at"];
        echo "</td><td>";
        switch($row['status']){
          case 'In_Progress':
            echo "In Progress";
          break;
        case 'Not_Applicable':
            echo  "Not Applicable";
          break;
          case 'Completed':
            echo  "Completed";
          break;
        default:
        echo  "Pending";
        break;}
        echo "</td><tr>";    
        }}
      else{
        echo "Sorry, No record found for the entered employee ID ", str_pad(intval($employee_ID), 6, "0", STR_PAD_LEFT) ;

      }}

?>
  </table>

    </body>
</html>

