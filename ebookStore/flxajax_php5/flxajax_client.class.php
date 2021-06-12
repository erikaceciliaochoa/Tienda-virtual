<?php    
/**
 * flxajax_client
 * handles the javascript output to the client
 * @package flxAJAX PHP5
 * @author Clemens Krack <ckrack@gmail.com>
 * @copyright Copyright (c) 2005
 * @version 0.2.2
 * @access public
 **/
class flxajax_client {

    public $request_type;
    public $handler_uri;
    public $func_prefix;
    public $func_list;
    private $js_has_been_shown = 0;
     
    /**
     * flxajax_client::flxajax_client()
     * @return void
     **/
    public function flxajax_client(&$func_list, &$request_type, &$handler_uri, &$func_prefix)
    {
        $this->func_list = &$func_list;
        $this->request_type = &$request_type;
        $this->handler_uri = &$handler_uri;
        $this->func_prefix = &$func_prefix;
    }
    
    /**
     * flxajax_client::get_common_js()
     * returns the common javascripts
     * @return string
     **/
    private function get_common_js() 
    {
        $t = strtoupper($this->request_type);
        if ($t != "GET" && $t != "POST") {
            return "// Invalid type: $t.. \n\n";
        }
            
        // heredoc string for javascript output
        $html = <<<JSCODE
        // flexible ajax library
        // author: clemens krack - ckrack@gmail.com - http://tripdown.de
        var flxajax_request_type = "{$t}";
        
        function flxajax_init_object() {
        
        var A;
        try {
            A=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        try {
            A=new ActiveXObject("Microsoft.XMLHTTP");
        } catch (oc) {
            A=null;
        }
        }
        if(!A && typeof XMLHttpRequest != "undefined")
            A = new XMLHttpRequest();
            return A;
        }
        function flxajax_do_call(func_name, args) {
        var i, x, n;
        var uri;
        var post_data;
        
        uri = "{$this->handler_uri}";
        if (flxajax_request_type == "GET") {
            if (uri.indexOf("?") == -1) 
                uri = uri + "?rs=" + escape(func_name);
            else
                uri = uri + "&rs=" + escape(func_name);
                
            for (i = 0; i < args.length-1; i++) 
                uri = uri + "&rsargs[]=" + escape(args[i]);
            uri = uri + "&rsrnd=" + new Date().getTime();
            post_data = null;
        } else {
            post_data = "rs=" + escape(func_name);
            for (i = 0; i < args.length-1; i++) 
                post_data = post_data + "&rsargs[]=" + escape(args[i]);
        }
        
        x = flxajax_init_object();
        x.open(flxajax_request_type, uri, true);
        if (flxajax_request_type == "POST") {
            x.setRequestHeader("Method", "POST " + uri + " HTTP/1.1");
            x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            x.setRequestHeader("Content-length",post_data.length); 
            x.setRequestHeader("Connection","close");
        }
        x.onreadystatechange = function() {
        if (x.readyState != 4) 
            return;
        
        var status;
        var data;
        status = x.responseText.charAt(0);
        data = x.responseText.substring(2);
        if (status == "-") 
            alert("Error: " + data);
        else  
            args[args.length-1](data);
        }
        x.send(post_data);
        delete x;
        }
JSCODE;
        return $html;
    }

    /**
     * flxajax_client::get_one_stub()
     * returns the javascript for each function wrapper
     * @return string
     **/
    private function get_one_stub($func_name) 
    {
        $html = <<<JSCRIPT
        
        // wrapper for {$func_name}
        function {$this->func_prefix}{$func_name}() {
            flxajax_do_call("{$func_name}", {$this->func_prefix}{$func_name}.arguments);
        }
JSCRIPT;
        return $html;
    }


    /**
     * flxajax_client::get_javascript()
     * returns all javascript code
     * @return string
     **/
    public function get_javascript()
    {
        $html = "";
        if (!$this->js_has_been_shown) {
            $html .= $this->get_common_js();
            $this->js_has_been_shown = 1;
        }
        foreach ($this->func_list as $func) {
            $html .= $this->get_one_stub($func);
        }
        return $html;
    }
}

?>
