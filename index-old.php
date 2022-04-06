<!DOCTYPE html>
<html lang="en">
<head>
    <title>QRANK - old Queensland rock climbing guides</title>
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
    QRANK - old Queensland rock climbing guides
</div>

<div id="content">

<div id="getstarted">
    Let's get started!
</div>

<div style="width: 100%; overflow: hidden;">

<?php
$path    = '.';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

include('class.pdf2text.php');

foreach ($files as $f) {
	$ext = pathinfo($f, PATHINFO_EXTENSION);
	if ($ext == "pdf") {
    $name = str_replace(".".$ext, "", $f);
    $name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $name);
    $name = str_replace("Guide_", "", $name)." Guide";

    $a = new PDF2Text();
    $a->setFilename($f);
    $a->decodePDF();
    $output = $a->output();
		echo "<div class=\"section\" style=\"width: 50%; float: left;\">\n<h2><a href=\"".$f."\">".$name."</a></h2>\n<p>".$ext."</p>\n<p style=\"max-height: 3em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-style: italic;\">".$output."</p></div>";
	} elseif (is_dir($f)) {
		$dfiles = scandir($f);
		$dfiles = array_diff(scandir($f), array('.', '..'));
		foreach ($dfiles as $df) {
			$dext = pathinfo($df, PATHINFO_EXTENSION);
			if ($dext == "html" || $dext == "htm" || $dext == "pdf" || $dext == "doc" || $dext == "docx") {
				$dft = str_replace(".".$dext, "", $df);
				$t = ($f == $dft ? $dft : $f." ".$dft);
				echo "<div class=\"section\" style=\"width: 50%; float: left;\">\n<h2><a href=\"".$f."/".$df."\">".$t."</a></h2>\n<p>".$dext."</p>\n</div>";
			}
		}
	}
}
?>


</div>

</div> <!-- /content -->

<div id="footer">
    This server is managed by <a href="https://wanderstories.space">Wanderstories</a>
</div>

</body>
</html>
