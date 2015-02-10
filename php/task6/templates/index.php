<!DOCTYPE html>
<html>
<head>
    <title>%TITLE%</title>
</head>
<body>
  <div><h2>Contact Form</h2></div>
  <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_NAME%</strong></div>
   <form action="index.php" method="post">
    <p>Name: <input type="name" name="name" value="%NAME%" /></p>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_EMAIL%</strong></div>
    <p>E-mail: <input type="text" name="email_cli" value="%EMAIL%" /></p>
       <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_SUBJECT%</strong></div>
       <p>Subject: <select name="select">
        <option value="null">
            select
        </option>
           <option %SELECTED_FIRST% value="first">
            first
        </option>
          <option %SELECTED_SECOND% value="second">
              second
          </option>       
       </select>
    </p>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_MASSAGE%</strong></div>
    <label name="massage">Massage</label>
    <p><textarea name="massage" value="%MASSAGE%" cols="30">%MASSAGE%</textarea></p>
    <p><input type="submit" name="email" value="Send mail"</p>
    <div style="color: green; font-size: 15px;"><strong>%ERRORS_SEND%</strong></div>
 </form>
</body>
</html>
