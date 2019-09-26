<?php
namespace cmr\html;
class Html extends Form{

    public function code($balise,$html,$class='',$id=''){
        if($class!=''){
            return "<$balise class='$class'>$html</$balise>";
        }else if($id!=''){
            return "<$balise id='$id'>$html</$balise>";
        }else if($class!=''&&$id=''){
            return "<$balise class='$class' id='$id'>$html</$balise>";
        }else{
            return "<$balise>$html</$balise>";
        }
        
    }
    public function h($num,$text){
        return  "<h$num>$text</h$num>";
    }
    public function p($text){
        return  "<p>$text</p>";
    }

    public function menu($lst,$class='',$id=''){
        $list=[];
        if(!empty($id)){
            foreach($lst as $k =>$v){
                $list[$k]="<li id=\"$id\">
                         <a class=\"$class\" href=\"$v\">$k</a>
                         </li>";        
        }
        return "<ul>".implode("",$list)."</ul>";     
        }else{
            foreach($lst as $k =>$v){
                $list[$k]="<li>
                         <a class=\"$class\" href=\"$v\">$k</a>
                         </li>";        
        }
        return "<ul>".implode("",$list)."</ul>";
        }
        }


    public function a($link,$text,$color=''){
        return  "<a class=\"btn-link $color\" href=\"$link\">$text</a>";
    }
    /**
     * create image
     *
     * @param string $src
     * @param string $alt
     * @return void
     */
    public function img($src,$alt='',$class=''){
        return  "<img class=\"$class\" src=\"$src\" alt=\"$alt\">";
    }
}

return $html = new Html();