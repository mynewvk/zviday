<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function emoji_replace($str){
     $code = array(
            ':-)',':-D',';-)','xD' ,';-P',':-p','8-)','B-)',':-(',';-]','3(' ,':!(',':_(',':((',':o',':|','3-)', '&gt;(','&gt;_(','O:)',';o','8|','8o',':X',':-*','}:)','&lt;3',':like:',':dislike:',':UP:',':V:',':OK:',
     );
        for($i=0;$i<32;$i++){
            $emoji[$i] = "<span class='emoji emoji-$i'></span>";
        }
        $r = str_replace($code, $emoji, $str);
        return $r;
    }
    function show_emoji_list(){
        $code = array(
               ':-)',':-D',';-)','xD' ,';-P',':-p','8-)','B-)',':-(',';-]','3(' ,':!(',':_(',':((',':o',':|','3-)', '&gt;(','&gt;_(','O:)',';o','8|','8o',':X',':-*','}:)','&lt;3',':like:',':dislike:',':UP:',':V:',':OK:',
        );
        $emoji = array();
        for($i=0;$i<32;$i++){
            $data_emoji = $code[$i];
            $emoji_1[$i] = "<span class='emoji emoji-$i emoji-pointer' data-emoji='$data_emoji' onclick='emoji_add($(this))'></span>";
            $string = "";
            $string = $string + $emoji_1[$i];
        }
        echo implode("", $emoji_1);
    }
    function show_emoji_list_q(){
        $code = array(
               ':-)',':-D',';-)','xD' ,';-P',':-p','8-)','B-)',':-(',';-]','3(' ,':!(',':_(',':((',':o',':|','3-)', '&gt;(','&gt;_(','O:)',';o','8|','8o',':X',':-*','}:)','&lt;3',':like:',':dislike:',':UP:',':V:',':OK:',
        );
        $emoji = array();
        for($i=0;$i<32;$i++){
            $data_emoji = $code[$i];
            $emoji_1[$i] = "<span class='emoji emoji-$i emoji-pointer' data-emoji='$data_emoji' onclick='emoji_add_q($(this))'></span>";
            $string = "";
            $string = $string + $emoji_1[$i];
        }
        echo implode("", $emoji_1);
    }
 