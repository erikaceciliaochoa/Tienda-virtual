function Ajax()
{
	var oAjax = false;
	if(window.XMLHttpRequest)
		oAjax = new XMLHttpRequest();
	else if(window.ActiveXObject)
	{
		try
		{
			oAjax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				oAjax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
			}
		}
	}
    return oAjax;
}


function desplegar_carrito()
    {
      if (!$("listado").visible())
      {
          $("listado").innerHTML="<div align='center' style='width: 600px; margin: -5em 5em 5em -12em;'><img src='images/ajax-loader.gif'/></div>";
          $("listado").show();

          var ajax=new Ajax();
          if(ajax)
          {
              ajax.onreadystatechange = function()
              {
                if(ajax.readyState == 4)
                    {
                        $("listado").hide();
                        $("listado").innerHTML=ajax.responseText;
                        $("listado").appear();
                    }
              }
              ajax.open("GET", "vercarrito.php", true);
              ajax.send(null);
          }
      }
      else
      { $("listado").fade(); }
    }

function eliminar_carrito(cual)
    {
      var eliminar = confirm("De verdad desea eliminar este libro?");
      if ( eliminar )
      {
          //AJAX
          var ajax=new Ajax();
          if(ajax)
          {
              ajax.onreadystatechange = function()
              {
                if(ajax.readyState == 4)
                    {
                        $("eliminar").innerHTML=ajax.responseText;
                    }
              }
              ajax.open("GET", "eliminar-carrito.php?idproducto="+cual, true);
              ajax.send(null);
              /* ("usuario=erika&id=15") */
          }
      }
    }

function finalizar_compra()
    {
      var respuesta = confirm("De finalizar su compra?");
      if ( respuesta )
      {
          var ajax=new Ajax();
          if(ajax)
          {
              ajax.onreadystatechange = function()
              {
                if(ajax.readyState == 4)
                    {
                        $("eliminar").innerHTML=ajax.responseText;
                    }
              }
              ajax.open("GET", "index.php?show=carrito.php", true);
              ajax.send(null);
          }
      }
    }

function novedades()
    {
          var ajax=new Ajax();
          if(ajax)
          {
              ajax.onreadystatechange = function()
              {
                if(ajax.readyState == 4)
                    {
                        $("eliminar").innerHTML=ajax.responseText;
                    }
              }
              ajax.open("GET", "index.php?show=list-productos.php", true);
              ajax.send(null);
          }
    }

function seleccionar_categoria(cual)
    {
          var ajax=new Ajax();
          if(ajax)
          {
              ajax.onreadystatechange = function()
              {
                if(ajax.readyState == 4)
                    {
                        $("eliminar").innerHTML=ajax.responseText;
                    }
              }
              ajax.open("GET", "index.php?list-productos.php&idcategoria="+cual, true);
              ajax.send(null);
          }
    }