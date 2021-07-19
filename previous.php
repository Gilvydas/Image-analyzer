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

    <div style="display: flex;
    align-content: space-between;
    justify-content: center;margin: 120px auto;flex-wrap: wrap;">

        <?php
        $label_string = file_get_contents('labels.json');
        $labels = json_decode($label_string, true);

        foreach ($labels as $key => $label) {

        ?>
            <div style="padding: 10px; display:inline-block; border: 1px solid black;">
                <h2 style="color:white"><?php echo $key + 1; ?></h2>
                <?php
                for ($i = 0; $i < 10; $i++) {
                ?>
                    <li style="color:white"> <?php echo $label[$i]  ?></li>
                <?php
                }
                ?><img style="height: 200px; width:200px;" src="<?php echo $label["id"]  ?>" alt="">
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>