<!DOCTYPE html>
<html>

<head>
  <title>IT Department - Feedback / Support / Request Forms</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1, initial-scale=0.45">
  <link rel="stylesheet" type="text/css" href="CSS.css">
</head>

<body>
  <form action="functions/checkRequest.php" method="POST">
    <div class="form">
      <div class="form-title"></div>
      <h2>IT Department - Feedback / Support / Request Forms</h2>
      <br>
      <p>Kindly filling the form with all necessary inform for us to provide best support offer. Thank you for your
        patience.
        General target respond time with not more than 2 business day.
      </p>
    </div>

    <div class="email">
      <p>Email<font color="red"> *</font>
      </p><br>
      <input type="email" name="email_address" placeholder="Your email address" required />
    </div>

    <div class="name">
      <p>Name<font color="red"> *</font>
      </p><br>
      <input placeholder="Your answer" type="text" name="name" required />
    </div>

    
    <div class="employeeID">
      <p>Employee ID<font color="red"> *</font>
      </p><br>
      <input placeholder="Your answer" type="text" name="employee_ID" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" 
      required />
    </div>

    <div class="department">
      <p>Department<font color="red"> *</font>
      </p><br>
      <input placeholder="Your answer" type="text" name="department" required />
    </div>

    <div class="request">
      <p>What is your request<font color="red"> *</font>
      </p><br>
        <label>
          <input type="radio" name="request_type" value="feedback">
          <span class="design"></span>
          <span class="value">Feedback, Suggestions and Complaints</span>
        </label>
        <label>
          <input type="radio" name="request_type" value="support">
          <span class="design"></span>
          <span class="value">Technical Support</span>
        </label>
        <label>
          <input type="radio" name="request_type" value="request">
          <span class="design"></span>
          <span class="value">Request Forms</span>
        </label>
    </div>

    <div class="next">
      <button type="submit">
        <font color="#673ab7">Next</font>
      </button>
    </div>
    </br></br>
  </form>
</body>

</html>
