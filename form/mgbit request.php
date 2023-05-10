<!DOCTYPE html>
<html>

<head>
   <title>IT Department - Feedback / Support / Request Forms</title>
   <link rel="stylesheet" type="text/css" href="mgbit.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=1, initial-scale=0.45">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   <form action="functions/submitForm.php" method="POST" enctype="multipart/form-data">
      <div class="form">
         <div class="form-title"></div>
         <h2>IT Department - Feedback / Support / Request Forms</h2>
      </div>

      <div class="note">
         <p class="note-title">&nbsp&nbsp Equipment/ Tools / Material Request Form</p>
         <br>
         <p class="note-description">Request of IT related equipments and tools.</p>
      </div>

      <div class="attach">
         <p>Attach of Requisition Approved Form (Hello Sign)<font color="red">*</font>
         </p>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <button type="button" class="btndesign">
            <font color="#3488ef">
               <i class="fa fa-upload"></i> Add File
            </font>
         </button>
         <input type="file" class="upload" id="uploadFile" name="files[]" multiple="multiple" required />
         <div id="upload_prev"></div>
      </div>

      <div class="request">
         <p>What are your request - Software / Hardware / Accesories</p>
         <div class="checkbox">
            <input type="checkbox" id="request-1" name="requests[]" value="Adobe Acrobat Pro DC">
            <label for="request-1">Adobe Acrobat Pro DC</label>
            <input type="checkbox" id="request-2" name="requests[]" value="Adobe illustrator">
            <label for="request-2">Adobe illustrator</label>
            <input type="checkbox" id="request-3" name="requests[]" value="Adobe Photoshop">
            <label for="request-3">Adobe Photoshop</label>
            <input type="checkbox" id="request-4" name="requests[]" value="AutoCAD LT">
            <label for="request-4">AutoCAD LT</label>
            <input type="checkbox" id="request-5" name="requests[]" value="Hello Sign">
            <label for="request-5">Hello Sign</label>
            <input type="checkbox" id="request-6" name="requests[]" value="Microsoft Project">
            <label for="request-6">Microsoft Project</label>
            <input type="checkbox" id="request-7" name="requests[]" value="Primavera Unifier">
            <label for="request-7">Primavera Unifier</label>
            <input type="checkbox" id="request-8" name="requests[]" value="Primavera 6">
            <label for="request-8">Primavera 6</label>
            <input type="checkbox" id="request-9" name="requests[]" value="SQL Accounting">
            <label for="request-9">SQL Accounting</label>
            <input type="checkbox" id="request-10" name="requests[]" value="Desktop PC">
            <label for="request-10">Desktop PC</label>
            <input type="checkbox" id="request-11" name="requests[]" value="Laptop">
            <label for="request-11">Laptop</label>
            <input type="checkbox" id="request-12" name="requests[]" value="Tablet">
            <label for="request-12">Tablet</label>
            <input type="checkbox" id="request-13" name="requests[]" value="Keyboard">
            <label for="request-13">Keyboard</label>
            <input type="checkbox" id="request-14" name="requests[]" value="Mouse - Wireless">
            <label for="request-14">Mouse - Wireless</label>
            <input type="checkbox" id="request-15" name="requests[]" value="Mouse - Wired">
            <label for="request-15">Mouse - Wired</label>
            <input type="checkbox" id="request-16" name="requests[]" value="Web Camera">
            <label for="request-16">Web Camera</label>
            <input type="checkbox" id="request-17" name="requests[]" value="Printer / Scanner">
            <label for="request-17">Printer / Scanner</label>
            <input type="checkbox" id="request-18" name="requests[]" value="Projector">
            <label for="request-18">Projector</label>
            <input type="checkbox" id="request-19" name="requests[]" value="Drone">
            <label for="request-19">Drone</label>
            <input type="checkbox" id="request-20" name="requests[]" value="Uninterruptible Power Supply (UPS)">
            <label for="request-20">Uninterruptible Power Supply (UPS)</label>
            <input type="checkbox" id="request-21" name="requests[]" value="Broadband Internet">
            <label for="request-21">Broadband Internet</label>
            <input type="checkbox" id="request-22" name="requests[]" value="Other">
            <label for="request-22">Other:</label><input type="text" class="Other" id="Other" name="other" placeholder="Please State">

         </div>
      </div>

      <div class="date">
         <p>Date of Requirement</p>
         <p class="date-font">Date</p>
         <input type="date" name="requirement_date" />
      </div>

      <div class="ques">
         <p>Do you have an existing vendor or supplier of the say item? Do you have a web link of the item? Indicate "NO"
            If you do not have.</p>
         <br><input placeholder="Your answer" type="text" name="is_existing_vendor_or_is_web_link_of_the_item">
      </div>

      <div class="btn">
        <div class="btna"><button type="button" onclick="history.back()"><font color="#673ab7">Back</font></button></div>
        <div class="btnb"> <button type="submit" name="submit">
        <font color="white">Submit</font>
        </button>
         </div>
      </div>
      <script src="request.js"></script>
   </form>

   <script>
      var fileCount = 0;

$(document).on('click', '.close', function() {
  $(this).parents('span').remove();
  fileCount -= 1;
})


$('#uploadFile').on('change', function () {
    let newfiles = this.files
  
    if (newfiles.length > 5) {
      alert('File number limit: 5')
      this.value = ''
    } else {
      const fileSize = this.files[0].size / 1024 / 1024;
      var check = checkExtension(this.files[0].name);
      if (fileSize > 100) {
        alert('File size exceeds 100 MB');
      } else if (!check) {
        alert('Allowed file types: Image, Video, PDF, Word, Excel');
      } else if (fileCount >= 5) {
        alert('File number limit: 5');
      } else {
        var filename = this.value;
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
          filename = filename.substring(lastIndex + 1);
        }
        var files = $('#uploadFile')[0].files;
        for (var i = 0; i < files.length; i++) {
            $("#upload_prev").append('<span>' + '<div class="filenameupload">' + files[i].name + '</div>' + '<p class="close" >&#10006</p></span>');

        }
        fileCount += files.length;
      }
    }
  });

function checkExtension(file) {
    var extension = file.substr( (file.lastIndexOf('.') +1) );
    var check = '';
    switch(extension) {
    
    case 'jpeg':
    check = true;
    break;
    case 'png':
    check = true; 
    break;
    case 'jpg':
    check = true; 
    break;
    case 'pdf':
    check = true; 
    break;
    case 'docx':
    check = true; 
    break;
    case 'docx':
    check = true; 
    break;
    case 'xlsx':
    check = true;
    break;  
    case 'mp4':
    check = true; 
    break;
    case 'mp3':
    check = true;
    break;
    default: 
    check = false;    
    }
    return check;
    }


      </script>
</body>

</html>