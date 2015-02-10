<?php
class HtmlHelper
{
   
  private $echo;

  static function select($arr, $param='multiple')
  {
    if(is_array($param))
    $param=implode(" ",$param);
    $echo.='<select '.$param.' class="form-control">';
    foreach($arr as $val)
    {$echo.="<option>$val</option>";}
    $echo.='</select>';
    return $echo;
  }

  static function ul(array $arr, $method='ul', $param=" ")
  {
    if(is_array($param))
    $param=implode(" ",$param);
    $echo.='<'.$method.' '.$param.' >';
    foreach($arr as $val)
    {$echo.="<li>$val</li>";}
    $echo.="</$method>";
    return $echo;
  }
  
    static function table($tr,$th=null ,$param=" ")
    {
        if(is_array($param))
        $param=implode(" ",$param);
        $echo.='<table '.$param.' class="table table-hover">';
            if(!$th==null){
                foreach($th as $val)
                {$echo.="<th>$val</th>";}
            }
            foreach($tr as $key=>$val)
            {   $echo.="<tr>";
                foreach($val as $name)
                {$echo.="<td>$name</td>";}
                $echo.="</tr>";
            }
        $echo.='</table>';
        return $echo;
    }
    
    
    static function dl_dt_dd(array $arr, $param=" ")
  {
    if(is_array($param))
    $param=implode(" ",$param);
    $echo.='<dl $param>';
    foreach($arr as $key=>$val)
    {$echo.="<dt>$key</dt>";          
    $echo.="<dd>$val</dd>";}    
    $echo.='</dl>';
    return $echo;
  }

    static function radio($val)
    {
        $echo.='<form>';
            foreach($val as $key=>$value)
            {$echo.='<br>Group '.$key.'<br>';
            foreach($value as $name=>$val)
                $echo.='<input type="radio" name="'.$key.'" value="'.$val.'" />'.$val.'<br>';}
        $echo.='</form>';
        return $echo;
    }
}
?>
