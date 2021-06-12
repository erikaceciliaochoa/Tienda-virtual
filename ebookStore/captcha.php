<html>
  <body>
    <form action="" method="post">
<?php

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




echo "
    <table>
    <form method='POST' name='form' action='enviar-pedido.php' onsubmit='
                if($(\"nombre\").value==\"\")
                {
                    alert(\"Complete el nombre\");
                    $(\"nombre\").focus();
                    return false;
                }
                else
                {
                  if($(\"apellido\").value==\"\")
                  {
                      alert(\"Complete su apellido\");
                      $(\"apellido\").focus();
                      return false;
                  }
                  else
                  {
                      if($(\"email\").value==\"\")
                      {
                          alert(\"complete email\");
                          $(\"email\").focus();
                          return false;
                      }
                      else
                      {
                          return confirm(\"Deseo confirmar la compra?\");
                      }
                    }
                }
    '>

        <tr>
            <td><b>Nombre</b></td>
            <td><input name='nombre' id='nombre' /></td><br />
        </tr>

        <tr>
            <td><b>Apellido</b></td>
            <td><input name='apellido' id='apellido'/></td><br />
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><input name='email' id='email'/><br /></td>
         </tr>

        <tr>
            <td><b>Mensaje</b></td><br />
            <td><textarea name='mensaje' id='mensaje'></textarea></td><br />
        </tr>



        <tr>
        <td><input type='submit' name='enviar' value='Enviar' />

             <input type='reset' name='borrar' value='Limpiar' /></td>
        </tr>



    </form>
    </table>
    ";





    # in a real application, you should send an email, create an account, etc
  } else {
    # set the error code so that we can display it. You could also use
    # die ("reCAPTCHA failed"), but using the error message is
    # more user friendly
    $error = $resp->error;
  }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" name="enviar" value="Enviar" />
    </form>
  </body>
</html>