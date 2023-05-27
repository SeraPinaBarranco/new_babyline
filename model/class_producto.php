<?php
header("Content-Type: application/json");
include_once "./db.php";

class producto extends PDO
{
    private $db;

    public $res, $codigo_barra, $codigo_barra2, $codigo_interno, $codigo_interno2, $nombre_producto, $fabricante, $cantidad, $precio_compra, $precio_venta, $buscar, $id_producto, $cantidad_e, $acabo;
    public function __construct(PDO $ddbb)
    {
        $this->db = $ddbb;
    }

    public function registrar(array $a): int
    {
        $query_check = "SELECT * FROM producto WHERE codigo_barra = ?";
        $stm = $this->db->prepare($query_check);
        $stm->execute([$a[0]]);
        $filas = $stm->rowCount();

        if ($filas > 0) {
            return -1;
        } else {

            $query = "INSERT INTO  producto(
                codigo_barra      ,
                codigo_interno    ,
                nombre            ,
                fabricante        ,
                cantidad_existente,
                precio_compra     ,
                precio_venta
                )
            values(
                :codigo_barra   ,
                :codigo_interno ,
                :nombre_producto,
                :fabricante     ,
                :cantidad       ,
                :precio_compra  ,
                :precio_venta
                )";

            $stm = $this->db->prepare($query);

            $stm->execute([
                'codigo_barra'    => $a[0],
                'codigo_interno'  => $a[1],
                'nombre_producto' => $a[2],
                'fabricante'      => $a[3],
                'cantidad'        => intval($a[4]),
                'precio_compra'   => $a[5],
                'precio_venta'    => $a[6]
            ]);

            return $stm->rowCount();
        }
    }


    public function actualiar(array $a)/*: int*/
    {
        $query = "UPDATE producto 

                    SET codigo_barra=       ?,
                        codigo_interno=     ?,
                        nombre=             ?,
                        fabricante=         ?,
                        cantidad_existente= ?,
                        precio_compra=      ?,
                        precio_venta=       ?,
                        ubicacion=          ? 

                        WHERE id_producto = ?";

        $stm = $this->db->prepare($query);
       
        $stm->execute([
            
             $a[1],
             $a[2],
             $a[3],
             $a[4],
             intval($a[5]),
             $a[6],
             $a[7],
             empty($a[8]) ? 9 : $a[8],
             //empty($a) ? intval($a[8]) : 1,
             $a[0],
        ]);
        return $stm->rowCount();
    }

    public function eliminar(string $id):int{
        $query = "DELETE FROM producto WHERE id_producto = ?";

        $stm = $this->db->prepare($query);

        $stm->execute([$id]);

        return $stm->rowCount();
       
    }

    public function consultar(string $search)
    {
        //$query = "SELECT * FROM producto WHERE codigo_barra LIKE :codigo_barra or nombre like :nombre or codigo_interno like :codigo_interno";

        $query = "SELECT producto.*,  concat(ubicacion.fila, ' - ', ubicacion.estanteria) as ubicacion_almacen FROM producto 
                    LEFT OUTER JOIN ubicacion
	                on producto.ubicacion = ubicacion.id_ubicacion
                    WHERE codigo_barra LIKE :codigo_barra or nombre like :nombre or codigo_interno like :codigo_interno";
        $stm = $this->db->prepare($query);

        $stm->execute([':codigo_barra' => "$search%", ':nombre' => "$search%", ':codigo_interno' => "$search%"]);

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        //json_encode($data);
        // while($fila = $stm->fetch()){
        //     array_push($fila);
        // }


        return $data;
    }
}

    







 /*
        $html = '
                <thead>
                <tr>
                <th>Nombre</th>
                <th>Fabricante</th>
                <th>Cantidad</th>
                <th>Codigo Barra</th>
                <th>Codigo Interno</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                ';

        $html .= '<tbody>';
        while ($fila = $stm->fetch(PDO::FETCH_OBJ)) {
            $html.="    <tr>
                <td>$fila->nombre</td>
                <td>$fila->fabricante</td>
                <td>$fila->cantidad_existente</td>
                <td>$fila->codigo_barra</td>
                <td>$fila->codigo_interno</td>
                <td>$fila->precio_compra</td>
                <td>$fila->precio_venta</td>
                <td><a href='#'>Editar</a></td>
                <td><a href=''>Eliminar</a></td>
                </tr>";
                 <td><a href="index.php?pag=editar&id=<?php echo $arreglo["id_producto"]; ?>">Editar</a></td>
                <td><a href="?pag=buscar&eliminar=<?php echo $arreglo["id_producto"]; ?>">Eliminar</a></td>
            
        }
        $html .= '</tbody>';*/
