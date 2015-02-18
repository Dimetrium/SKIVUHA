<?php
class HtmlHelper
{
   
  private $out;

 /*
 *Builder for select tags;
 *
 *@param arr: Input array of data. Which will be data for <option>.
 *@param param: Can take param for tags select. Defaul set 'multiple'.
 *@return string: Return complited list.
 */
  public static function select($arr, $param='multiple')
  { 
    $out='';
    if(is_array($param))
    {
      $param=implode(" ",$param);
    }
    $out.='<select '.$param.' class="form-control">';
    foreach($arr as $val)
    {
      $out.="<option>$val</option>";
    }
    $out.='</select>';
    return $out;
  }

 /*
 *Builder for ul-ol tags.
 *
 *@param arr: Input array of data. Which will be data for <li>.
 *@param method: Choise list method UL or OL.
 *@param param: Can take param for tags UL or OL. Default set 'ul'.
 *@return string: Return complited list.
 */
  public static function ul($arr, $method='ul', $param=" ")
  { 
    $out='';
    if(is_array($param))
    {
      $param=implode(" ",$param);
    }
    $out.='<'.$method.' '.$param.' >';
    foreach($arr as $val)
    {
      if(is_array($val))
      {
        $out.=self::ul($val, $method ='ul');
      }
      else
      {
        $out.="<li>$val</li>";
      }
    }
    $out.="</$method>";
    return $out;
  }
  
 /*
 *Builder for table tags.
 *
 *@param tr: Input row data.
 *@param th: Input head of table. Default sel 'null'.
 *@param param: Can take param for tags table. Default set ' '.
 *@return string: Return complited table.
 */
    public static function table($tr,$th=null ,$param=" ")
    {   
      $out='';
      if(is_array($param))
      {
        $param=implode(" ",$param);
      }
      $out.='<table '.$param.' class="table table-hover">';
      if(!$th==null)
      {
        foreach($th as $val)
        {
          $out.="<th>$val</th>";
        }
      }
      foreach($tr as $key=>$val)
      {
        $out.="<tr>";
        foreach($val as $name)
        {
          $out.="<td>$name</td>";
        }
        $out.="</tr>";
      }
      $out.='</table>';
      return $out;
    }
    
 /*
 *Builder for dl-dt-dd tags.
 *
 *@param arr: Input associative array data. Where 'key' - DT, 'value' - DD.
 *@param param: Can take param for tags DL. Default set ' '.
 *@return string: Return complited dl-dt-dd.
 */
    public static function dlDtDd(array $arr, $param=" ")
    {
      $out='';
      if(is_array($param))
      {
        $param=implode(" ",$param);
      }
      $out.='<dl $param>';
      foreach($arr as $key=>$val)
      {
        $out.="<dt>$key</dt>";          
        $out.="<dd>$val</dd>";
      }    
      $out.='</dl>';
      return $out;
    }

 /*
 *Builder for radio tags.
 *
 *@param val: Input multidimensional array data. Where first 'key' - name of group , second - 'value' - value.
 *@return string: Return complited radio by group.
 */
    public static function radio($val)
    {
      $out='';
      $out.='<form>';
      foreach($val as $key=>$value)
      {
        $out.='<br>Group '.$key.'<br>';
        foreach($value as $name=>$val)
        {
          $out.='<input type="radio" name="'.$key.'" value="'.$val.'" />'.$val.'<br>';
        }
      }
      $out.='</form>';
      return $out;
    }
}
?>
