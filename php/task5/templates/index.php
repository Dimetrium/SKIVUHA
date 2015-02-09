<!DOCTYPE html>
<html>
<head>
    <title>My Band</title>
</head>
<body>
<h3><?=$name_of_band?></h3>
<table border="1">
<?php
    
foreach($band->getMusician() as $musician)
{
    echo '<tr><td colspan="2">'.$musician->musician. '</td><td></td></tr>';
foreach($musician->getInstrument() as $key=>$instrument)
{   
    echo '<tr>';
    echo '<td>'.$instrument->category.'</td>';
    echo '<td>'.$instrument->name.'</td>';
    echo '</tr>';
}
    
    
    
}

?>
    </table>
</body>
</html>