<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    function load_media($params)
    {

    	$scripts = array(
    		'jquery' => '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>',
    		'main.js' =>'<script src="/media/js/main.js"></script>',
    		'bootstrap_js' => '<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>',
    		'bootstrap_css' => '<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">',
            'timeago' => '<script type="text/javascript" src="/media/js/timeago.js"></script>',
    		'lightbox_js' => '<script type="text/javascript" src="/media/js/lightbox-2.6.min.js"></script>',
            'vk_js' => '<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>',
            'main.css' => '<link rel="stylesheet" href="/media/css/main.css">',
    		'lightbox_css' => '<link rel="stylesheet" href="/media/css/lightbox.css">',
    		);

    	$str = "";
    	if(is_array($params)){
    		foreach ($params as $key => $value) {
    			$str .= $scripts[$value] . "\n";
    		}
    	}
    	else{
    		$str = $scripts[$params] . "\n";
    	}
    	echo $str;
    }

   function vk_login_link(){
        return "https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri=".base_url()."auth/vk&response_type=code&v=5.5";
    }
    function link_replace($ask = null)
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