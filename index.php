<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Image analyzer</title>
    <style>
        body,
        html {
            height: 100%;
        }

        .bg {
            background-image: url("images/bg.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg">
    <div class="container" <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin:auto; background:white; padding:20px; box-shadow: 10px 10px 5px #888">
                <div class="panel-heading">
                    <h2>Google Cloud Vision API</h2>
                    <p style="font-style:  italic;">Image Processing Engine</p>
                </div>
                <hr>
                <form action="check.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" accept="imgage/" class="form-control">
                    <br>
                    <button type="submit" style="border-radius: 0px;" class="btn btn-lg btn-block btn-outline-success">Analyze Image</button>
                    <button type="submit" style=" border-radius: 0px;" class="btn btn-lg btn-block btn-outline-success"><a style="text-decoration: none; color: green;" href="http://localhost/image-analyzer/previous.php"> View previous image analyzes</a></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>