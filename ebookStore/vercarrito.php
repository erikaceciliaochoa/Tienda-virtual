<?php
    session_start();
    echo "<div id='conten_vercarrito'>";
    echo "<table>
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
      echo "<td><div id='eliminar'><a href='#' onclick='eliminar_carrito({$_SESSION["carrito"][$i][0]}); return false;'><img src='images/eliminar.png'></a></div></td>";
      echo "<td>{$titulo}</td>";
      echo "<td>{$_SESSION["carrito"][$i][1]}</td>";
      echo "<td>{$_SESSION["carrito"][$i][3]}</td>";
      echo "<td>{$subtotal}</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<div class='etiqueta'>TOTAL: {$total}</div>";
    echo "</div>";
?>