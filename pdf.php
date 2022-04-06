<?php
$filename = $_GET["file"];
include('class.pdf2text.php');
$a = new PDF2Text();
$a->setFilename($filename);
$a->decodePDF();
$output = $a->output();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Old Queensland climbing guides</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }
        #header {
            background-color: #f1f1f1;
            border-bottom: 1px solid #ddd;
            padding: 30px;
            text-align: center;
            color: #444;
            font-size: 22px;
        }
        #content {
            padding: 20px;
            text-align: center;
            font-size: 18px;
        }
        #content a {
            color: #3e68ff;
        }
        #getstarted {
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 18px;
            width: 200px;
            margin: 10px auto 20px auto;
            padding: 10px;
        }
        .section {
            margin-bottom: 40px;
            padding: 0 20px;
        }
        h2 {
            font-size: 20px;
            font-weight: normal;
        }
        h2 a {
            text-decoration: none;
        }
        .section p {
            font-size: 14px;
        }
        #footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #888;
            max-width: 540px;
            margin-left: auto;
            margin-right: auto;
        }
        #footer a {
            color: #555;
        }
    </style>
</head>
<body>
<div id="header">
    Old Queensland climbing guides
</div>

<div id="content">

<div id="getstarted">
    <?php echo $filename ?>
</div>

<div style="width: 100%; overflow: hidden;">

<?php echo $output ?>

</div>

</div> <!-- /content -->

<div id="footer">
    This server is managed by <a href="https://wanderstories.space">Wanderstories</a>
</div>

</body>
</html>
