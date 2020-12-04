<?php

namespace App\Utils;

class HtmlEscapeEx
{
    public static function toEscapedArray($array, $allow_sp_tag_item_keys = Array()){
        array_walk_recursive($array,'self::escapeWithSpTagAllowKeys',$allow_sp_tag_item_keys);
        return $array;
    }

    public static function escapeWithSpTagAllowKeys(&$item,$key,$allow_sp_tag_item_keys){
        // Default escaped
        $item = htmlspecialchars($item, ENT_HTML401);

        // Allow Special Tag keys
        if(in_array($key, $allow_sp_tag_item_keys)){
            $replaced = $item;
            /*
            $replace でエスケープされたタグをもう一度タグに戻す処理を、書いてください。
            タグは、b と、br を許容します。
            */ 
            $item = $replaced;
        }
    }
}
