function checkFields()
{
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
}