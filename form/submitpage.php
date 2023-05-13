<!DOCTYPE html>
<html>

<head>
  <title>IT Department - Feedback / Support / Request Forms</title>
  <meta charset="UTF-8">  
  <link rel="stylesheet" type="text/css" href="submitpage.css">
  <meta name="viewport" content="width=1, initial-scale=0.45">
</head>

<body>
  <div class = "form">
    <div class= "form-title"></div>
    <h2>IT Department - Feedback / Support / Request Forms</h2>
    <br>
    <p>Your response has been recorded.</p><br>
    <p>Your code is <?php echo str_pad(intval($_GET["id"]), 4, "0", STR_PAD_LEFT);?>.</p>
    <p>You can check the status by your code <a href="chk code.php">here</a>.</p> 
    <br>
    <a href="forms.php"><p>Submit another response</p></a>
  </div>

</body>
</html>
