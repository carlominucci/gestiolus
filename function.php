<?php
function greppaurl($stringa){
        $pezzi=explode(" ", $stringa);
        $regexpurl="/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        foreach ($pezzi as &$pezzo) {
                if(preg_match('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', $pezzo)){
                        echo "<a href=\"" . $pezzo . "\" target=\"_blank\">". $pezzo . "</a> ";
                }else{
                        echo $pezzo . " ";
                }
        }
}
?>
