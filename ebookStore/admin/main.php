<?php
  session_start();
  require("class.bd.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title> <?php echo "Curso PHP login"; ?> </title>
<!-- <link href="estilo.css" rel="stylesheet" type="text/css" /> -->
<link href="css/dark-night.css" rel="stylesheet" type="text/css" />
<!--<script>
    function $(elemento)
    {
      return documento.getElementById(elemento);
    }
</script>-->
<script src="../scriptaculous/lib/prototype.js" type="text/javascript"></script>
<script src="../scriptaculous/src/scriptaculous.js" type="text/javascript"></script>
<script src="../scriptaculous/src/buider.js" type="text/javascript"></script>
<script src="../scriptaculous/src/effects.js" type="text/javascript"></script>
<script src="scriptgeneral.js" type="text/javascript"></script>

</head>
<body>
<div id="indice">
<table border="1" width="1004" cellpodding="0" celspacing="0" align="center">
 <tr>
	<td class="titulo">
      <?php
       echo "Usuario Logeado:".$_SESSION["login"]["nombre"];
      ?>	
	</td>
 </tr>
 <tr>
     <td>
	<table border="1" width="1004" cellpodding="0" celspacing="0"> 
	   <tr class="infsub">
     		<td width="200" valign="top">
		
		 <table border="1">
		  <tr>
		   <td><a href="main.php?show=list-usuarios.php">Usuarios</a></br>
           <a href="main.php?show=list-categorias.php">Categorias</a></br>
		       <a href="main.php?show=list-productos.php">Productos</a></br>
        	       <a href="logout.php" onclick="return confirm ('¿Desea Salir?');">Cerrar Sesion</a>
		   </td>
			
		  </tr>
		 </table valign="top">
		</td>
		<td><?php
			$archivo =$_GET["show"];
			if (file_exists($archivo))
			{
			include($archivo);
			}
			else
			echo "Bienvenido Al Sistema";
		    ?>		
		</td>
           </tr>
	</table>			
     </td>
 </tr>
 <tr>
     <td height="30" class="subtitulo"> PIE</td>
 </tr>
</table>
</div>

</body>
</html>


