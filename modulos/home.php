<div class="historial-cuenta-container">
    <h4 class="titulo-historial">Atención de Servicios Informaticos. No. Usuario <?= $_SESSION['id_cliente'] ?></h4>
    <div class="linea-divisora-home"></div><br>
    <?php
        $conn = conectar();
        $sql = 'SELECT * FROM "atencion_servicio"';
        $stmt = oci_parse($conn, $sql);
        $q = oci_execute($stmt);

        if($q) {
            if ($obj = oci_fetch_object($stmt)) {
                do {

    ?>
    <div class="container">
        <a href="?p=transaccion" class="waves-effect waves-light btn right">Reportar nuevo incidente</a>
    </div>

    <div class="container">

        <table class="striped">
            <thead>
            <tr>
                <th>ID Ticket</th>
                <th>Fecha Creacion</th>
                <th>Fecha Completado</th>
                <th>Fecha Expiración</th>
                <th>Titulo</th>
                <th>Descripción Incidente</th>
                <th>Archivo Adjunto</th>
                <th>Eficiencia Servicio de 1 a 5</th>
                <th>Descripción Solución</th>
                <th>Prioridad</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Departamento</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $sql2 = 'SELECT * FROM "atencion_servicio" ORDER BY "id_ticket" DESC';
                $stmt2 = oci_parse($conn, $sql2);
                $q2 = oci_execute($stmt2);

                if($q2) {
                    if ($obj2 = oci_fetch_object($stmt2)) {
                        do {

            ?>
                                <tr>
                                    <td><?= $obj2->id_ticket ?></td>
                                    <td><?= $obj2->fecha_creacion ?></td>
                                    <td><?= $obj2->fecha_completado ?></td>
                                    <td><?= $obj2->fecha_expiracion ?></td>
                                    <td><?= $obj2->titulo ?></td>
                                    <td><?= $obj2->descripcion_incidente ?></td>
                                    <td><?= $obj2->archivo_adjunto ?></td>
                                    <td><?= $obj2->eficiencia_servicio ?></td>
                                    <td><?= $obj2->descripcion_solucion ?></td>
                                    <td><?= $obj2->id_prioridad ?></td>
                                    <td><?= $obj2->id_categoria ?></td>
                                    <td><?= $obj2->id_estado ?></td>
                                    <td><?= $obj2->id_usuario ?></td>
                                    <td><?= $obj2->id_dpto ?></td>
                                </tr>
            <?php
                        } while ($obj2 = oci_fetch_object($stmt2));
                    } else {
                        echo "<p>No hay incidentes aún</p>";
                    }
                } else {
                    oci_free_statement($stmt2);
                }
            ?>
            
            </tbody>
        </table>


    </div>

    <?php
                } while ($obj = oci_fetch_object($stmt));
            } else {
                echo "<p>No se encontraron incidentes</p>";
            }
        } else {
            oci_free_statement($stmt);
        }
    ?>
   

</div>
