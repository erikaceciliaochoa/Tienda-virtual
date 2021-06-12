<?php    
/**
 * flxajax_server
 * handles the client subrequests
 * @package flxAJAX PHP5
 * @author Clemens Krack <ckrack@gmail.com>
 * @copyright Copyright (c) 2005
 * @version 0.2.2
 * @access public
 **/
class flxajax_server {

    private $func_list;
    private $mode;
    private $func_name;
    private $args;
     
    /**
     * flxajax_server::flxajax_server()
     * @return void
     **/
    public function flxajax_server(&$func_list)
    {
        $this->func_list = &$func_list;
    }

    /**
     * check_client_request()
     * checks whether a client request exists
     * @return boolean
     **/
    public function check_client_request()
    {
        $this->mode = "";
        if (!empty($_GET["rs"])) {
            $this->mode = "get";
        } else if (!empty($_POST["rs"])) {
            $this->mode = "post";
        } else if (empty($this->mode)) {
            // no request
            return FALSE;
        }
        if ($this->mode == "get") {
            $this->func_name = $_GET["rs"];
            if (!empty($_GET["rsargs"])) {
                $this->args = $_GET["rsargs"];
            } else {
                $this->args = array();
            }
        } else {
            $this->func_name = $_POST["rs"];
            if (!empty($_POST["rsargs"])) {
                $this->args = $_POST["rsargs"];
            } else {
                $this->args = array();
            }
        }
        // request O.K.
        return TRUE;
    }
    
    /**
     * flxajax_server::handle_client_request()
     * handles the subrequests from the xmlhttprequest objects
     * calls the requested functions
     * @return string
     **/
    public function handle_client_request() 
    {
        if ($this->mode == "get") {
            // Bust cache in the head
            header ("Expires: Thu, 31 Jan 1985 04:30:00 GMT");    // my birthday ;)
            header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            // always modified
            header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
            header ("Pragma: no-cache");                          // HTTP/1.0
        }
        
        #### replace echo with return
        
        // check if func may be called
        if (!in_array($this->func_name, $this->func_list) OR !function_exists($this->func_name)) {
            return "-:{$this->func_name} not callable";
        } else {
            // call the functions
            $result = call_user_func_array($this->func_name, $this->args);
            return "+:" . $result;
        }
        exit;
    }
}

?>
