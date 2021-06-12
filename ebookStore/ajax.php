<?php
    require("flxajax_php5/flxajax.class.php");
	require("flxajax_php5/flxajax_client.class.php");
    require("flxajax_php5/flxajax_server.class.php");
    require("admin\class.bd.php");
    session_start();

	// define the function to use
    //esta funcion es en php y se llama en x_multiply
    function AgregarCarrito($idproducto) {

            //tengo que recorrer la session para saber si esta
            for($i=0; $i<count($_SESSION["carrito"]); $i++)
            {
              if($_SESSION["carrito"][$i][0]==$idproducto)
              {
                $_SESSION["carrito"][$i][1]++;
                $encontrado = true;
                break;
              }
            }
            if(!$encontrado)
            {
              $bd = new BD();
              // $sql = "select * from productos where idproducto=$idproducto";

              $sql="SELECT * FROM productos where idproducto= %d";
              $sql=sprintf($sql, $idproducto);

              $registros = $bd->ejecutar($sql);
              $r = $bd->retornar($registros);
              $_SESSION["carrito"][] = array($r["idproducto"],1,$r["nombre"], $r["valor"]);
            }

                $cantidad=0;
                for($i=0; $i<count($_SESSION["carrito"]); $i++)
                {
                  $cantidad+=$_SESSION["carrito"][$i][1];
                }
                return $cantidad;

	}

	$ajax = new flxajax();
    $ajax->request_type = "get"; // or get //*como enviar los datos
	$ajax->add("AgregarCarrito"); // allows multiple parameters //*Nombre de la funcion que quiero tranformar
    // $ajax->add("multiply2");
	$server = $ajax->get_server();
	if ($server->check_client_request()) {
        // server the subrequest only (do not print html/js again)
        echo $server->handle_client_request();
        exit;
	}
    $client = $ajax->get_client();
?>

    <?php
        echo $client->get_javascript();
        //esto me genera todo el codigo escrito antes en ajax
    ?>
