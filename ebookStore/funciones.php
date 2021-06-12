<?php
    function retornar_producto($registro)
    {
      $contador=1;
      $primera=true;
      foreach(glob("fotos/{$registro["idproducto"]}-*.jpg") as $archivo)
      {
          if($primera)
          {
              $imagen = "<img src=\"{$archivo}\" width='100' height='150' align='middle' id='image_{$registro["idproducto"]}-1.jpg' />";
              $primera=false;
          }
          $imagen .= "<div class='visor_img'>";
          $imagen .= "<a href=\"{$archivo}\" rel=\"lightbox[galeria_{$registro["idproducto"]}]\"> {$contador} </a>";
          $imagen .= "</div>";

          $contador++;
      }

      $titulo= htmlentities($registro["nombre"], ENT_NOQUOTES,"ISO-8859-15");
      $descripcion= htmlentities($registro["descripcion"], ENT_NOQUOTES,"ISO-8859-15");
      $venta="<img src='images/venta.png' id='ima_{$registro["idproducto"]}-1.jpg' />";
      $copia="<img src='fotos/{$registro["idproducto"]}-1.jpg' width='100' height='150' align='middle' id='copia_{$registro["idproducto"]}-1.jpg' />";

      $html="<div class='promotion_section'>

                      <div style='margin: 10px 10px 0px 10px; float:left;
                          width: 98px;'>
                        {$imagen}
                      </div>

                      <div style='margin: 10px 10px 0px -108px; float:left;
                          width: 98px;'>
                         {$venta}
                      </div>

                      <div style='margin: 10px 10px 0px -108px;	float:left;
                      width: 98px; height: 155px; '>
                        {$copia}
                      </div>

                      <h2>{$titulo}</h2> <br />

                        <p>{$descripcion}</p><br />
                        <p><b><font size='8'>\${$registro["valor"]}</font></b></p><br />

                        <form action='#' onsubmit='

                        x_AgregarCarrito(this.idproducto.value,
                        	function(cadena)
                        	{
                                    $(\"productos\").show();
                                    // cadena=str_replace(\"+:\", \"\" , cadena);
                                    $(\"productos\").innerHTML=cadena;
                                    $(\"productos\").fade({ duration: 2.0, from: 0.1, to: 1.0 });

                                    new Effect.Parallel([
                                      Effect.Shrink(\"copia_{$registro["idproducto"]}-1.jpg\", { sync: true }),
                                      new Effect.Opacity(\"copia_{$registro["idproducto"]}-1.jpg\", { sync: true, from: 1, to: 0 }),
                                      new Effect.Opacity(\"ima_{$registro["idproducto"]}-1.jpg\", {  sync: true, from: 6, to: 0 }),
                                      Effect.Appear(\"image_{$registro["idproducto"]}-1.jpg\", { sync: true })

                                    ], {
                                      duration: 2.5, afterFinish:
                                          function()
                                          	{
                                                $(\"copia_{$registro["idproducto"]}-1.jpg\").show(),
                                                $(\"image_{$registro["idproducto"]}-1.jpg\").setStyle({
                                                  top: 0,
                                                  left: 0,
                                                  opacity: 1
                                                })
                                            }

                                        }
                                    );
                            }
                            );

                        return false;
                        '>
                            <input type='hidden' value='{$registro["idproducto"]}' name='idproducto'/>
                            <input type='submit' value='Agregar al carrito' id='agregar' />
                        </form>

             </div>";
             return $html;
    }


function retornar_mensaje()
{
    $browser = $_SERVER["HTTP_USER_AGENT"];
    // HTTP_USER_AGENT: Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1) ; Embedded Web Browser from:
    If(strpos($browser, "MSIE 6")!==false)
    {
      echo "<div style='background: #FFFF99; color: #FF0000; text-align: center;'>
              <h4>Actualice su browser a:</h4>
              <a href='http://www.opera.com/'><img src='images/Opera.png' width='60' height='60' border='0' alt='Opera' /> </a>
              <a href='http://www.google.com/chrome'><img src='images/Chrome.png' width='60' height='60' border='0' alt='Chrome' /> </a>
              <a href='http://www.mozilla-europe.org/es/firefox/'><img src='images/Firefox.png' width='60' height='60' border='0' alt='Firefox' /> </a>
              <a href='http://www.microsoft.com/spain/windows/internet-explorer/'><img src='images/IE.png' width='60' height='60' border='0' alt='Internet Explorer' /></a>
              <a href='http://browser.netscape.com/'><img src='images/Netscape.png' width='60' height='60' border='0' alt='Netscape' /> </a>
              <h4>De lo contrario no podra visualizar correctamente el sitio</h4>
      </div>";
      echo "<link href='cga.css' rel='stylesheet' type='text/css' />";
    }
    else
    {
      echo "<link href='css/red_style.css' rel='stylesheet' type='text/css' />";
    }
}


function retornar_temperatura()
{
        $link = fopen("http://www.infoclima.com/pronosticos/argentina/cordoba/?l=10","r");
        $contenido = 0;
        while(!feof($link))
        {
          $contenido.=fread($link, 1024);
        }
        $i = strpos($contenido, "id=e32p")+8;
        $f = strpos($contenido, "</span>", $i);
        $temperatura = substr($contenido, $i, $f-$i);
        fclose($link);
        $html="Cba Capital: $temperatura";
        return $html;
}
?>