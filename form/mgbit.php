<?php
session_start();
$username = $_SESSION['uname'];
?>

<html>

<head>
  <title>IT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Created_At</th>
        <th scope="col">Email_Address</th>
        <th scope="col">Name</th>
        <th scope="col">employee_ID</th>
        <th scope="col">Department</th>
        <th scope="col">Request_Type</th>
        <th scope="col">Feedback Desc</th>
        <th scope="col">Feedback Doc</th>
        <th scope="col">S/H Description</th>
        <th scope="col">S/H Screenshot</th>
        <th scope="col">Requisition Approved Form</th>
        <th scope="col">Software_Hardware Accessories</th>
        <th scope="col">Requirement Date</th>
        <th scope="col">Is_existing_vendor or is web_link of the item</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        <th scope="col">Action By</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "mgb");
      $sql = "SELECT id, created_at, email_address,name,employee_ID, department, request_type, 
feedback_description, feedback_documents_or_images, software_hardware_description,
 software_hardware_screenshot, requisition_approved_form
,software_hardware_accessories,requirement_date, is_existing_vendor_or_is_web_link_of_the_item, 
status, action_by FROM applications";

      if (isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];
        mysqli_query($conn, "update applications set status='$status', action_by='$username' where id='$id'");
        header("Location:mgbit.php");
        die();
      }

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>";
          echo $row["id"];
          echo "</td><td>";
          echo $row["created_at"];
          echo "</td><td>";
          echo $row["email_address"];
          echo "</td><td>";
          echo $row["name"];
          echo "</td><td>";
          echo $row["employee_ID"];
          echo "</td><td>";
          echo $row["department"];
          echo "</td><td>";
          echo $row["request_type"];
          echo "</td><td>";
          echo $row["feedback_description"];
          echo "</td><td>";
          //echo $row["feedback_documents_or_images"];
          $file1= $row["feedback_documents_or_images"];
          echo "<a href='./documents/$file1'>$file1</a>";
          echo "</td><td>";
          echo $row["software_hardware_description"];
          echo "</td><td>";
          // echo $row["software_hardware_screenshot"];
          $file2= $row["software_hardware_screenshot"];
          echo "<a href='./documents/$file2'>$file2</a>";
          echo "</td><td>";
          // echo $row["requisition_approved_form"];
          $file3= $row["requisition_approved_form"];
          echo "<a href='./documents/$file3'>$file3</a>";
          echo "</td><td>";
          echo $row["software_hardware_accessories"];
          echo "</td><td>";
          echo $row["requirement_date"];
          echo "</td><td>";
          echo $row["is_existing_vendor_or_is_web_link_of_the_item"];
          echo "</td><td>";



          switch ($row['status']) {
            case 'UpdateStatus':
              echo "Update Status";
              break;
            case 'In_Progress':
              echo "In Progress";
              break;
            case 'Not_Applicable':
              echo "Not Applicable";
              break;
            case 'Completed':
              echo "Completed";
              break;
            default:
              echo "Pending";
              break;
          }

          echo "</td><td>"; ?>

          <select onchange="status_update(this.options[this.selectedIndex].value,
'<?php echo $row['id']  ?>'
)">
            <?php
            echo $row['id']
            ?>
            ')">
            <option value="UpdateStatus">Update Status</option>
            <option value="In_Progress">In Progress</option>
            <option value="Not_Applicable">Not Applicable</option>
            <option value="Completed">Completed</option>
          </select>
      <?php

          echo "</td><td>";
          echo $row["action_by"];
          echo "</td></tr>";
        }
      } else {
      }
      echo "</table>";
      $conn->close();


      ?>


    </tbody>
  </table>

  <script type="text/javascript">
    function status_update(value, id) {
      window.location.href =
      <?php
              $localIP = getHostByName(php_uname('n'));
       "http://$localIP/form/mgbit.php"
      ?>"?id=" + id + "&status=" + value;
    }
  </script>
</body>

</html>