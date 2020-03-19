<?php
namespace cmrweb;
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
    public function h($num,$text,$class=null){
        if($class){
            return  "<h$num class='$class'>$text</h$num>";
        }else{
            return  "<h$num>$text</h$num>";
        }
        
    }
    public function p($text){
        return  "<p>$text</p>";
    }
    public function navMenu($lst,$class='',$id=''){
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
                $list[$k]="<li id=\"$k\" >
                         <a class=\"$class\" href=\"$v\">$k</a>
                         </li>";        
        }
        return "<ul>".implode("",$list)."</ul>";
        }
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


    public function a(string $link,string $text,bool $blank=false,string $class=""){
        if($class){
            if($blank){
                return  "<a class=\"$class\" href=\"$link\" target='_blank'>$text</a>";
            }else
            return  "<a class=\"$class\" href=\"$link\">$text</a>";
        }else{
            if($blank){
                return  "<a href=\"$link\" target='_blank'>$text</a>";
            }else
            return  "<a href=\"$link\">$text</a>";
        }
       
    }
    /**
     * create image
     *
     * @param string $src
     * @param string $alt
     * @return void
     */
    public function img($src,$alt='image',$class=''){
        return  "<img class=\"$class\" src=\"$src\" alt=\"$alt\" id=\"$alt\">";
    }

    public function iframe($src){
        return "<iframe src='$src'  width='560' height='315' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
    }
}