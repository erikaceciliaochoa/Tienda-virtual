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

function eliminar_imagen(archivo, imagen)
    {
      var eliminar = confirm("Desea eliminar esta imagen?");
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
                        $("indice").innerHTML=ajax.responseText;
                    }
              }
              /*alert('hola');
              alert('eliminar-foto.php?archivo="+imagen"."&"."."idproducto="+imagen');*/

              ajax.open("GET", "eliminar-foto.php?archivo="+archivo, true);
              //ajax.open("GET", "eliminar-carrito.php?idproducto="+cual, true);
              ajax.send(null);
              /* ("usuario=erika&id=15") */
          }
      }
    }