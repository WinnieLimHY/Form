<!DOCTYPE html>
<html>

<head>
   <title>IT Department - Feedback / Support / Request Forms</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=1, initial-scale=0.45">
   <link rel="stylesheet" type="text/css" href="mgbit.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body>

   <form action="functions/submitForm.php" method="POST" enctype="multipart/form-data">
      <div class="form">
         <div class="form-title"></div>
         <h2>IT Department - Feedback / Support / Request Forms</h2>
      </div>

      <div class="note">
         <p class="note-title">&nbsp&nbsp Feedback / Suggestions and Complaints</p>
         <br>
         <p class="note-description">Please state the feedback, comments, and complaints. You may also provide your
            comment
            or advise too.</p>
      </div>

      <div class="description">
         <p>Description of your comments, feedbacks or complaints<font color="red"> *</font>
         </p>
         <br> <input placeholder="Your answer" type="text" name="feedback_description" required>
      </div>

      <div class="document">
         <p>Documents or Images of the described</p>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <button type="button" class="btndesign">
            <font color="#3488ef">
               <i class="fa fa-upload"></i> Add File
            </font>
         </button>
         <input type="file" class="upload" id="uploadFile" name="files[]" multiple="multiple"
          />
         <div id="upload_prev"></div>
      </div>

      <div class="btn">
         <div class="btna"><button type="button" onclick="history.back()">
                  <font color="#673ab7">Back</font>
               </button></div>


         <div class="btnb"> <a href="submitpage.php">
               <button type="submit">
                  <font color="white">Submit
                  </font>
               </button>
            </a>
         </div>
      </div>
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
