<?php

namespace cmrweb;

class Vue
{
    static private $arrays;
    static private $vars;
    static private $v;
    static private $arrayParam;
    static private $arrayTag;
    static private $tag;
    static private $arrayOrigin;
    static private $arrayContent;
    static function template($templateFile, $controller)
    {
        include($controller);
        $template = file_get_contents($templateFile);
        preg_match_all("/[^=]\{\w*\}/", $template, self::$v);
        preg_match_all("/for=\{\w*\}/", $template, self::$arrays);
        preg_match_all("/[^=]\{\w*\.\w*\}/", $template, self::$arrayParam);
        preg_match_all("/\{\w*\}/", implode("|", self::$arrays[0]), $arrayNames);
        preg_match_all("/\<.*?(for.*|\{\>$=\S*?)/", $template, $arrayTag);

        if ($arrayTag[0])
            foreach ($arrayTag[0] as self::$tag) {
                self::$arrayTag[] = preg_replace("/\<|for=\{\w*\}|\s|\>/", "", self::$tag);
            }
        if (self::$v)
            foreach (self::$v[0] as $var) {
                self::$v[] = preg_replace("/\>/", "", $var);
                $phpVar[] = "$" . preg_replace("/\W/", "", $var);
            }
        if (self::$arrays)
            foreach (self::$arrays[0] as $arr) {
                $phpArray[$arr] = "$" . preg_replace("/for|\W/", "", $arr);
            }
        self::$v = array_slice(self::$v, 1);
        self::$tag = array_slice($arrayTag, 1);
        if ($arrayTag[0])
            self::$arrayTag = self::$arrayTag[0];
        $arrayNames = preg_replace("/\{|\}/", "", $arrayNames[0]);
        self::$tag = self::$tag[0];
        self::$arrayOrigin = preg_replace("/\<|\>/", "", self::$arrayParam[0]);
        self::$arrayParam =  preg_replace("/\s|\>|\"|\{|\}|\w*\./", "", self::$arrayParam[0]);
        if ($arrayTag[0]) {
            $arrT = self::$arrayTag;
            preg_match_all("/\<(?=\w)*.*for.*[\s|\w|\W]*\W$arrT\>/", $template, self::$arrayContent);
            self::$arrayContent = self::$arrayContent[0];
        }

        if (self::$v)
            foreach ($phpVar as $var) {
                eval("self::\$vars[] =  json_encode($var,true);");
            }
        if ($arrayTag[0]) {
            foreach ($phpArray as $k => $arr) {
                eval("self::\$arrays[] = json_encode($arr,true);");
            }
            self::$arrays = (array_slice(self::$arrays, 1));
            self::$arrays = json_decode(self::$arrays[0], true);
        }

        ob_start("cmrweb\Vue::render");
        include $templateFile;
        ob_get_flush(); ?>
        <script>
            let array = document.getElementsByTagName("<?= self::$arrayTag ?>");
            array[0].outerHTML = array[0].outerHTML.replace(/<?= self::$arrayTag ?>/g, "cmr-loop");
            let imgs = document.getElementsByTagName('img');
            for (let i = 0; i < imgs.length; i++) {
                if (imgs[i].getAttribute('src') == "asset/img/upload/")
                    imgs[i].remove();

            }
            var loop = document.getElementsByTagName('cmr-loop');
            loop[0].innerHTML = "";
            for (let i = 0; i < array.length; i++) {

                loop[0].append(array[i]);

            }
        </script><?php
    }

    static function render($buffer)
    {
        $buffer = preg_replace(self::$v, self::$vars, $buffer);

        for ($j = 0; $j < count(self::$arrays); $j++) {
            $buffer .= preg_replace("/\<|\w|\>/", " ", self::$arrayTag) . self::$arrayContent[0];
            for ($i = 0; $i < count(self::$arrayParam); $i++) {
                $buffer = preg_replace(self::$arrayOrigin[$i], self::$arrays[$j][self::$arrayParam[$i]], $buffer);
            }
        }
        $buffer = preg_replace("/\"|\{|\}/", "", $buffer);
        return $buffer;
    }
}
