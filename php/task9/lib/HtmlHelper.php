<?php
class HtmlHelper
{
   
  private $echo;

  static function select($arr)
  {
    $echo.='<select multiple>';
    foreach($arr as $val)
    {$echo.="<option>$val</option>";}
    $echo.='</select>';
    return $echo;
  }

  static function ul($arr)
  {
    $echo.='<ul>';
    foreach($arr as $val)
    {$echo.="<ol>$val</ol>";}
    $echo.='</ul>';
    return $echo;

  }
}
?>
