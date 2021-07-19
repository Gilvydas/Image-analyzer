<?php
session_start();
if (!empty($_POST)) {
    $label[] = $_POST['label0'];
    $label[] = $_POST['label1'];
    $label[] = $_POST['label2'];
    $label[] = $_POST['label3'];
    $label[] = $_POST['label4'];
    $label[] = $_POST['label5'];
    $label[] = $_POST['label6'];
    $label[] = $_POST['label7'];
    $label[] = $_POST['label8'];
    $label[] = $_POST['label9'];
    $label['id'] = $_POST['photo'];

    $labelsArray[] = $label;
    $label_string = json_encode($labelsArray);

    if (file_exists('labels.json')) {
        if (!empty('labels.json')) {
            $label_string = file_get_contents('labels.json');
            $labels = json_decode($label_string, true);
            $labels[] = $label;
            $label_string = json_encode($labels);
            file_put_contents('labels.json', $label_string);
        }
    } else {
        file_put_contents('labels.json', $label_string);
    }
}
header('Location: http://localhost/image-analyzer/index.php');
