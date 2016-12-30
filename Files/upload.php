<form class="modal-content animate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Izlaz">&times;</span>
  </div>

  <div class="container">
    <label><b>Odaberite sliku kojom želite zamijeniti postojeću:</b></label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Upload slike" name="submit"><br>
    <label><b>Odaberite redni broj slike koju mijenjate:</b></label>
    <input type="radio" name="brojSlike" value="1" checked>1
    <input type="radio" name="brojSlike" value="2">2
    <input type="radio" name="brojSlike" value="3">3
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
  </div>
</form>


<?php
$target_dir = "../Images/";
$target_file = "";
if (isset($_FILES["fileToUpload"])) {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
}

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $_POST['submit'] = basename( $_FILES["fileToUpload"]["name"]);
    $uploadOk = 0;
}
// Check file size
if (isset($_FILES["fileToUpload"])) {
  if ($_FILES["fileToUpload"]["size"] > 900000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $_POST['submit'] = basename( $_FILES["fileToUpload"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
