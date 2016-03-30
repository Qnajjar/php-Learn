<?php
output_code();
function output_code()
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
<title>Upload File</title>
        <style>
body {margin: 0; padding: 0; background-color: #CCC;}

.fileuploadholder {
  width: 400px;
  height: 200px;
  margin: 60px auto 0px auto;
background-color: #FFF;
border: 1px solid #CCC;
padding: 6px;
}
        </style>
      </head>
      <body>

        <div class="fileuploadholder">
          <form action="FileUpload.php" method="post" enctype="multipart/form-data" name="fileuploadForm" id="fileuploadForm">
            <label for="UploadFileField"></label>
              <input type="file" name="UploadFileField" id="UploadFileField" />
              <input type="submit" name="UploadButton" id="UploadButton"  value="Upload">
          </form>
        </div>
      </body>
  </html>


<?php
?>
<?php
}
?>