<?php
session_start();

require "vendor/autoload.php";

use Google\Cloud\Vision\VisionClient;

$vision = new VisionClient(['keyFile' => json_decode(file_get_contents("APIkey.json"), true)]);



$PhotoResource = fopen($_FILES['image']['tmp_name'], 'r');
$image = $vision->image($PhotoResource, ['LABEL_DETECTION']);
$result = $vision->annotate($image);

if ($result) {
    $imagetoken = random_int(111111, 999999999);
    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/feed/' . $imagetoken . ".jpg");
} else {
    header("location: index.php");
    die();
}

$labels = $result->labels();
$faces = $result->faces();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Image analyzer</title>
    <style>
        body,
        html {
            height: 100%;
            background: url("images/bg.jpg") no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="max-width: 1080px;">
        <br><br><br>
        <div class="row">
            <div class="col-md-12" style="margin:auto; background:white; padding:20px; box-shadow: 10px 10px 5px #888">
                <div class="panel-heading">
                    <h2><a href="/"> Google Cloud Vision API</a></h2>
                    <p style="font-style:  italic;">Image Processing Engine</p>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4" style="text-align: center;">
                        <img class="img-thumbnail" src="<?php echo "./feed/" . $imagetoken . ".jpg"; ?>" alt="Analyzed image">
                    </div>
                    <div class="col-md-8 border" style="padding: 10px;">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-labels" role="tabpanel" aria-labelledby="pills-labels-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <?php include "labels.php" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button><a href="http://localhost/image-analyzer/index.php">Analyze another image</a></button>
                    <button><a href="http://localhost/image-analyzer/previous.php"> View previous image analyzes</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>