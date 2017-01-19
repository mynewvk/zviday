<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    function link_replace($ask)
    {
        $preg_autolinks = array(
            'pattern' => array(
                "'[\w\+]+://[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+'si",
                "'([^/])(www\.[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+)'si",
            ),
            'replacement' => array(
                '<a href="$0" class="alert-link" >$0</a>',
                '$1<a href="http://$2" >$2</a>',
            ));
        $search = $preg_autolinks['pattern'];
        $replace = $preg_autolinks['replacement'];
        $ask = preg_replace($search, $replace, $ask);
        return $ask;
    }
 