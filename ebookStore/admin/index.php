<html>
<head>
 <title> <?php echo "Panel de administración"; ?> </title>
 <link href="css/login.css" rel="stylesheet" type="text/css" />
 <script>
    function $(elemento)
    {
      return document.getElementById(elemento);
    }
</script>
</head>
<body>

<div id="content_login">
    <H1>Acceso a la administración de e-BookSTORE</H1>
    <div id="content_input">
    <form method="POST" action="validar.php"name="session" id="session" onsubmit="

        if($('usuario').value=='')
        {
            alert('complete el usuario');
            $('usuario').focus();
            return false;
        }
        else
        {
            if($('clave').value=='')
            {
                alert('complete la clave');
                $('clave').focus();
                return false;
            }
            else
            {
                return true;
            }
        }
    " >
    <p>
    <label>Usuario</label>
    <input type "text" name="usuario" id="usuario" class="inputbox" size="15"/>
    </p>

    <p>
    <label>Clave</label>
    <input type="password" name="clave" id="clave" class="inputbox" size="15"/>
    </p>

    <div class="conten_button">
        <input type="submit" name ="enviar" id="enviar" value="Enviar Datos" class="button" />
    </div>

    </form>
    </div>
<div class="img_lock">
<img src="images/login_lock.jpg" alt="" />
</div>
<div class="conten_m_err">
<?php
if(isset($_GET["error"]))
{
echo "<div class='mensaje_err'>Usuario o Clave incorrectos</div>";
}
?>
</div>
</div>
</body>
</html>


