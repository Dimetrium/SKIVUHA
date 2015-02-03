<!DOCTYPE html>
<html>
<head>
    <title>In the file of change</title>
</head>
<body>
<div style="border:2px solid #ccc; width: 500px; text-align: center;">
<?php foreach($text_in_file as $text) 
    echo $text;
?>
</div>
<br>
<hr>
    <p>Old string: <b><?=$string?></b></p>
    <p>New string: <b><?=$string_changes?></b></p>
    <p>Old symbol: <b><?=$sim?></b></p>
    <p>New symbol: <b><?=$sim_changes?></b></p>

<hr>
<br>
<div style="border:2px solid #ccc; width: 500px; text-align: center;">
<?php
	for($i = 0; $i < count($newfile); $i++)
	{
		echo $newfile[$i].'<br/>';
	}
?>
</div>
</body>
</html>