<?php
namespace cmr\html;
/**
 * Undocumented class
 */
class Form{
   
/**
 * formOpen function
 *
 * @param string $action
 * @param string $method
 * @param string $color
 * @return void
 */  
public function formOpen($action,$method,$color=''){     
    return  "<form action=\"$action\" method=\"$method\" class=\"$color\" enctype='multipart/form-data'>";
}
/**
 * Undocumented function
 *
 * @return void
 */
public function formClose(){ return  "</form>";}
/**
 * Undocumented function
 *
 * @param [type] $type
 * @param [type] $name
 * @param [type] $label
 * @param string $po
 * @return void
 */
public function input($type,$name,$label,$po=''){
    if($po!=''){
        return  "<div class=\"form\">
        <label for=\"$name\">$label</label>
        <input type=\"$type\" class=\"input\" name=\"$name\" 
        placeholder=\"$po\" id=\"$name\">
        </div>";
    }else{
        return  "<div class=\"form\">
        <label for=\"$name\">$label</label>
        <input type=\"$type\" class=\"input\" name=\"$name\" 
        id=\"$name\">
        </div>";
    }   
}
/**
 * Undocumented function
 *
 * @param [type] $type
 * @param [type] $color
 * @param string $label
 * @param string $id
 * @return void
 */
public function button($type,$color,$label='',$name='',$id=''){
    if($id){
        return  "<button type=\"$type\" name=\"$name\" class=\"btn $color\" id=\"$id\">$label</button>";
    }else{
        return  "<button type=\"$type\" name=\"$name\" class=\"btn $color\">$label</button>";
    }
   
}
public function textarea($row,$name,$label='',$id=''){
    
    return  "<div class=\"form\">
    <label for=\"$id\">$label</label>
    <textarea rows=\"$row\" name=\"$name\" class=\"textarea\" id=\"$id\"></textarea>
    </div> ";
  
}

public function checkbox($value,$text,$name='',$id=''){
    
    return  "<div class=\"form\">
    <label for=\"$id\">
      <input class=\"form-check\" type=\"checkbox\" value=\"$value\" name=\"$name\" id=\"$id\">
      $text
    </label>
    </div>";
  
}

public function option($value,$text,$name='',$id=''){
    
    return  "<div class=\"form\">
    <label for=\"$id\" class=\"form-check-label\">
      <input class=\"form-check\" type=\"radio\" 
      name=\"$name\" id=\"$id\" value=\"$value\">
      $text
    </label>
    </div>";
  
}


public function select($opt,$label='',$name='',$id=''){
    $option='';
    foreach($opt as $k =>$v){
       $option .="<option value=\"$k\">$v</option>";
    }

    return  "<div class=\"form\">
    <label for=\"$id\">$label</label>
    <select name=\"$name\" id=\"$id\" class=\"form-control\">
    $option
    </select>
    </div>";
  
}




}

