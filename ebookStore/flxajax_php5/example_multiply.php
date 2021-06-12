<?php
    require("flxajax.class.php");
	require("flxajax_client.class.php");
    require("flxajax_server.class.php");
	
	// define the function to use
    //esta funcion es en php y se llama en x_multiply
    function multiply($x, $y) {
		return $x * $y;
	}
	
	$ajax = new flxajax();
    $ajax->request_type = "post"; // or get //*como enviar los datos
	$ajax->add("multiply"); // allows multiple parameters //*Nombre de la funcion que quiero tranformar
    // $ajax->add("multiply2");
	$server = $ajax->get_server();
	if ($server->check_client_request()) {
        // server the subrequest only (do not print html/js again)
        echo $server->handle_client_request();
        exit;
	}
    $client = $ajax->get_client();
	
?>
<html>
<head>
	<title>Multiplier</title>
  <script>
  //<![CDATA[
  //<!-- 
  <?php
    echo $client->get_javascript();
    //esto me genera todo el codigo escrito antes en ajax
  ?>
	
	function do_multiply_cb(z) {
		document.getElementById("z").value = z;
	}
	
	function do_multiply() {
		// get the folder name
		var x, y;
		
		x = document.getElementById("x").value;
		y = document.getElementById("y").value;
		x_multiply(x, y, do_multiply_cb);
	}
	//]]>
  //-->
  </script>
	
</head>
<body>
	<input type="text" name="x" id="x" value="2" size="3">
	*
	<input type="text" name="y" id="y" value="3" size="3">
	=
	<input type="text" name="z" id="z" value="" size="3">
	<input type="button" name="check" value="Calculate"
		onclick="do_multiply(); return false;">
</body>
</html>
