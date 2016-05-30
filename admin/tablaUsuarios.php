<?php
        $sql = "SELECT * FROM usuario";
        $result = mysqli_query($tienda, $sql);
        echo "<table id='table_usuarios'>";
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
            echo "<tr>";
                    echo "<th>Id del usuario</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Nombre de usuario</th>";
                    echo "<th>Apellido</th>";
                    echo "<th>Pais</th>";
                    echo "<th>Ciudad</th>";
                    echo "<th>Fecha de ingreso</th>";
                    echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["idusuario"]. "</td><td>"
                                . $row["nombre"]. "</td><td> "
                                . $row["nickname"]. "</td><td> "
                                . $row["apellido"]. "</td><td> "
                                . $row["pais"]. "</td><td> "
                                . $row["ciudad"]. "</td><td> "
                                . $row["fechaingreso"]. "</td>";
                        echo "</tr>";
                }
        } else {
                echo "<tr><td>No se encontraron resultados<td></tr>";
        }
        echo "</table>";
        mysqli_close($tienda);
        ?>
