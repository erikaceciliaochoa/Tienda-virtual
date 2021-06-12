<?php
    echo"<table class='carrito' border>
            <tr>
                <th>Eliminar</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>SubTotal</th>
            </tr>";
    $total=0;
    $subtotal=0;
    for($i=0; $i<count($_SESSION["carrito"]); $i++)
    {
      $subtotal=$_SESSION["carrito"][$i][3] * $_SESSION["carrito"][$i][1];
      $total+=$subtotal;
      $titulo= htmlentities($_SESSION["carrito"][$i][2], ENT_NOQUOTES,"ISO-8859-15");
      echo "<tr>";
      echo "<td><a href='#' onclick='eliminar_carrito({$_SESSION["carrito"][$i][0]}); return false;'><img src='images/eliminar.png'></a></td>";
      echo "<td>{$titulo}</td>";
      echo "<td>{$_SESSION["carrito"][$i][1]}</td>";
      echo "<td>{$_SESSION["carrito"][$i][3]}</td>";
      echo "<td>{$subtotal}</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<div class='etiqueta'>TOTAL: {$total}</div>";
?>

<html>
<head>
<!--<script type="text/javascript" src="JS/ValidarCampos.js"></script> -->
<script src="lib/prototype.js"></script>
<script src="src/scriptaculous.js"></script>
<script src="src/buider.js"></script>
<script src="src/effects.js"></script>
</head>
<body>
<div id="formulario" style="display:none;">

<!--    return checkFields();  -->
    <div id="content_input">
    <form method="POST" name="form" action="enviar-pedido.php" onsubmit="
                if($('nombre').value=='')
                {
                    alert('Complete el nombre');
                    $('nombre').focus();
                    return false;
                }
                else
                {
                  if($('apellido').value=='')
                  {
                      alert('Complete su apellido');
                      $('apellido').focus();
                      return false;
                  }
                  else
                  {
                      if($('email').value=='')
                      {
                          alert('complete email');
                          $('email').focus();
                          return false;
                      }
                      else
                      {
                          return confirm('Deseo confirmar la compra?');
                      }
                    }
                }
    ">
            <br />
            <p>
            <label>Nombre</label>
            <input name="nombre" id="nombre" class="inputbox" /><br />
            </p>

            <p>
            <label>Apellido</label>
            <input name="apellido" id="apellido" class="inputbox" /><br />
            </p>

            <p>
            <label>Email</label>
            <input name="email" id="email" class="inputbox" /><br />
            </p>

            <p>
            <label>Mensaje</label>
            <textarea name="mensaje" id="mensaje" class="inputbox"></textarea><br />
            </p>

       <?php
/*        echo "<br />";
        require_once('recaptchalib.php');
        $publickey = "6Ld-YwwAAAAAACOIP_opJ4H2nm-ySfd-jP7WXfLl";
        $privatekey = "6Ld-YwwAAAAAALWAjYxv7kMLHF3iZSKFRGKVQb0K";

        # the response from reCAPTCHA
        $resp = null;
        # the error code from reCAPTCHA, if any
        $error = null;

        # are we submitting the page?
        if ($_POST["enviar"]) {
          $resp = recaptcha_check_answer ($privatekey,
                                          $_SERVER["REMOTE_ADDR"],
                                          $_POST["recaptcha_challenge_field"],
                                          $_POST["recaptcha_response_field"]);

          if ($resp->is_valid) {
            echo "You got it!";
            # in a real application, you should send an email, create an account, etc
          } else {
            # set the error code so that we can display it. You could also use
            # die ("reCAPTCHA failed"), but using the error message is
            # more user friendly
            $error = $resp->error;
          }
        }
        echo recaptcha_get_html($publickey, $error);*/
       ?>


        <?php echo "<br />";  ?>
         <div class="conten_button">
        <input type="submit" name="enviar" class="button" value="Enviar" id="enviar"/>
        <input type="reset" name="borrar" class="button" value="Limpiar" />
        </div>
    </form>
    </div>

</div>
 <button name="enviarpedido" class="button" id="enviarpedido" onclick="Effect.toggle('formulario', 'slide', { delay: 0.5 }); $('enviarpedido').fade(); ">Enviar pedido</button>
    <!--Effect.toggle('id_of_element', 'slide', { delay: 0.5 });  -->
<!-- <br /><a href='#' onclick="$('formulario').show(); return false;">Enviar pedido</a>-->
</body>
</html>
