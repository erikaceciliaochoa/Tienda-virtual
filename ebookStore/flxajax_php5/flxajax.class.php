<?php    
/**
 * flxajax
 * factory for the client and server objects, registry for the function list.
 * @package flxAJAX PHP5
 * @author Clemens Krack <ckrack@gmail.com>
 * @copyright Copyright (c) 2005
 * @version 0.2.2
 * @access public
 **/
class flxajax {

    public $request_type;
    public $handler_uri;
    public $func_prefix = "x_";
    private $func_list = array();
     
    /**
     * flxajax::flxajax()
     * @return void
     **/
    public function flxajax($request_type = "GET", $handler_uri = FALSE, $func_prefix = "x_")
    {
        $this->request_type = $request_type;
        $this->func_prefix = $func_prefix;
        if ($handler_uri) {
            $this->handler_uri = $handler_uri;
        } else {
            $this->handler_uri = $_SERVER['REQUEST_URI'];
        }
    }
    
    /**
     * flxajax::add()
     * adds callable functions
     * @return string
     **/
    public function add() 
    {    
        $n = func_num_args();
        for ($i = 0; $i < $n; $i++) {
            $this->func_list[] = func_get_arg($i);
        }
    }
    
    /**
     * flxajax::get_client()
     * creates and returns a new client object
     * @return object
     **/
    public function &get_client()
    {
        $client = new flxajax_client($this->func_list, $this->request_type, $this->handler_uri, $this->func_prefix);
        return $client;
    }

    /**
     * flxajax::get_server()
     * creates and returns a new server object
     * 
     * @return object
     **/
    public function & get_server()
    {
        $server = new flxajax_server($this->func_list);
        return $server;
    }
}
?>
