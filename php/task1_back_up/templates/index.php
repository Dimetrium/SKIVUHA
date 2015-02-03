<!DOCTYPE html>
<html>
<head>
    <title>File Uploader</title>
</head>
<body style="text-align: center; weight:960px; margin:0 auto;">
   <form action="index.php" method="post" enctype="multipart/form-data">
       <input type="file" name="user_file" />
       <input type="submit" />
   </form>
   <h3><?php echo $var;?></h3>
   <hr>
   <table align="center" border="1" cellpadding="6" frame="1" width="800">
       <tr>
           <th>N</th>
           <th>Name of file</th>
           <th>Size</th>
           <th>Delete</th>
       </tr>
        <?php
while($name= readdir($dir)):
    if(is_dir($name))
        continue;
        else
       ?>
        <tr><td><?=$count?><br></td>
        <td><?=$name?><br></td>
        <td><?=sizefile(filesize("files/$name"))?><br></td>
        <td><a href="index.php?name=<?=$name?>">Delete</a><br></td></tr>
    <?php 
$count++;
endwhile;
closedir($dir);
    ?>
   </table>
   
</body>
</html>