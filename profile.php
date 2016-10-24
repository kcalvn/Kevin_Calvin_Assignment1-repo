<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/main.css" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Resume</title>

  </head>
  <body>
    <?php
      $target_dir = "uploads/";
      $target_file = $target_dir.basename($_FILES["profile-image"]["name"]);
      $upload = 1;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

      if(isset($_POST["submit"])) {

        $check = getimagesize($_FILES["profile-image"]["tmp_name"]);

        if($check !== false){
          //echo "File is an image - " . $check["mime"]. ".";
          $upload = 1;
        }else {
          echo "File is not an image.";
          $upload = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          echo "Only .jpg, jpeg and .png files are allowed.";
          $upload = 0;
        }

        if ($upload == 0){
          echo "File was not uploaded.";
        }else {
          if (move_uploaded_file($_FILES["profile-image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename($_FILES["profile-image"]["name"])."has been uploaded";
          }else {
            echo "Sorry, there was an error uploading your image";
          }
        }
      }else {
        echo "Something else";
      }
    ?>
    <div class="container">
      <div class="wrapper">
        <div class="row">
          <p>Basic Info</p>
          <div class="divider"></div>
          <div class="col s6">
            <div class="circular">
              <img src='uploads/<?php echo $_FILES["profile-image"]["name"]; ?>' alt="<?php echo $_POST["fullName"]; ?>" />
            </div>
          </div>
          <div class="col s6">
              <p><span class="title-label">Full Name:</span><br/> <?php echo $_POST["fullName"]; ?></p>
              <p><span class="title-label">Gender:</span><br/> <?php echo $_POST["gender"]; ?></p>
              <p><span class="title-label">Date of Birth:</span><br/> <?php echo $_POST["dob"]; ?></p>
              <p><span class="title-label">Years of Experience:</span><br/> <?php echo $_POST["experience"]; ?></p>
              <p><span class="title-label">Industry:</span><br/> <?php echo $_POST["industry"]; ?></p>
              <p><span class="title-label">Location:</span><br/> <?php echo $_POST["location"]; ?></p>
              <p><span class="title-label">About me:</span><br/> <?php echo $_POST["aboutMe"]; ?></p>
          </div>
        </div>
        <div class="row">
          <p>Skills</p>
          <div class="divider"></div>
          <div class="col s6"></div>
          <div class="col s6">
            <p><span class="title-label">Professional Title:</span><br/> <?php echo $_POST["profTitle"]; ?></p>
            <p><span class="title-label">Career Level:</span><br/> <?php echo $_POST["careerLevel"]; ?></p>
            <p><span class="title-label">Communication level:</span><br/> <?php echo $_POST["commlvl"]; ?></p>
            <p><span class="title-label">Organizational level:</span><br/> <?php echo $_POST["orglvl"]; ?></p>
            <p><span class="title-label">Job Related level:</span><br/> <?php echo $_POST["jobrellvl"]; ?></p>
          </div>
        </div>
        <div class="row">
          <p>Contact</p>
          <div class="divider"></div>
          <div class="col s6"></div>
          <div class="col s6">
            <p><span class="title-label">Address:</span><br/> <?php echo $_POST["Address"]; ?></p>
            <p><span class="title-label">Phone number:</span><br/> <?php echo $_POST["phone"]; ?></p>
            <p><span class="title-label">Website:</span><br/>  <a href='<?php echo $_POST["website"]; ?>'><?php echo $_POST["website"]; ?></a> </p>
            <p><span class="title-label">Email:</span><br/> <?php echo $_POST["_email"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
