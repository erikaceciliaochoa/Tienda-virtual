<?php
  session_start();
  require("admin\class.bd.php");
  require("funciones.php");
  $bd = new BD();

  //cargo la variable cant
    $cantidad=0;

    for($i=0; $i<count($_SESSION["carrito"]); $i++)
    {
      $cantidad+=$_SESSION["carrito"][$i][1];
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-BookSTORE</title>

<!--<link href="css/red_style.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script src="scriptaculous/lib/prototype.js" type="text/javascript"></script>
<script src="scriptaculous/src/scriptaculous.js" type="text/javascript"></script>
<script src="scriptaculous/src/buider.js" type="text/javascript"></script>
<script src="scriptaculous/src/effects.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<script src="js/scriptgeneral.js" type="text/javascript"></script>

<script src="ajax.php" type="text/javascript"></script>

<?php echo retornar_mensaje();?>

</head>
<body>
<div id='eliminar' >
<div id="container_wrapper">
<div id="container">
     <div id="header">
		<div id="site_title">e-book<span>STORE</span></div>
        <h3>
        <?php // echo retornar_temperatura(); ?>
        </h3>
	</div>
    
	<div id="menuleft"></div>
	<div id="menu">
        <ul>
         <!--barra roja!! -->
         <li><a title="Página principal" href="#">Principal</a></li>
         <li><a title="Conocenos" href="#"> Conocenos </a></li>
         <li><a href="#" onclick="novedades(); return false;">Novedades </a></li>
         <li><a href="#">Contactanos</a></li>
         <li><a href="#">Mi cuenta</a></li>
         <li><a href="#">Registrate</a></li>
        </ul>
    </div>

	<div id="content">
		<div id="left_column">

        	<div class="section2">
            	<h1>Buscar</h1>
                 <a name="listado"></a>  
                <form name="buscar" action="index.php" onsubmit="

                      if($('busqueda').value.length<3)
                      {
                          alert('Ingrese por lo menos tres letras');
                          $('busqueda').focus();
                          return false;
                      }
                      else
                      {
                          return true;
                      }

                  ">
                       <input type = "hidden" name="show" id="show" value="list-productos.php" />
                        <input name="busqueda" id="busqueda" type="text" />
                        <input type="submit" name="enviar" value="buscar" class="button" />
                </form>

            </div>
			<div class="section2">
            	<h1>Categorías</h1>

                  <?php
                      $sql="SELECT * FROM categorias ORDER BY descripcion";
                      $registro = $bd->ejecutar($sql);
                      while($categoria = $bd->retornar($registro))
                      {
                        // echo "<a href='#' onclick='seleccionar_categoria({$categoria["idcategoria"]}); return false;'>";
                        echo "<a href='index.php?list-productos.php&idcategoria={$categoria["idcategoria"]}#listado' >";
                        $categoria= htmlentities($categoria["descripcion"], ENT_NOQUOTES,"ISO-8859-15");
                        echo $categoria."<br />";
                      }
                  ?>
            </div>
            <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a><br />&nbsp;
		</div>

		<div id="right_column">
            <div class="section_carrito">

                <div class="cantidad">
                <span style=" font-size:12px; ">Productos</span><span id="productos" style=" font-size:30px; "> <?php echo $cantidad; ?> </span>
                </div>

                <div class="opcs_carrito">
                   <ul>
                   <li><a href="#" onclick="desplegar_carrito(); return false;">Ver carrito</a></li>
                         <div  style="position:relative;">
                             <div id="listado" style="position:absolute; display:none; margin: 70px 0px 0px -410px;"></div>
                         </div>
                   <li><div ><a href="#" onclick="finalizar_compra(); return false;">Finalizar compra</a></div></li>
                  </ul>
                </div>

            </div>
            <br /><br /><br />
        	<h1>Libros disponibles</h1>
            <div class="scroll">
                <?php
        			$archivo =$_GET["show"];
        			if (!file_exists($archivo))
        			{
        			    $archivo="list-productos.php";
        			}
                    include($archivo);
    		    ?>
            </div>
		</div>
	</div>

	<div id="footer">
		<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Member</a> | <a href="#">Contact Us</a><br />
        Copyright © 2010 <a href="#">e-bookSTORE</a> | Designed by <a href="http://www.templatemo.com" target="_blank">erika8a.com</a>
	</div>
</div>
</div>
</div>
</body>
</html>