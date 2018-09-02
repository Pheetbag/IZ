<?php
ini_set('memory_limit', '-1');

class consultas_reportes{

    private $conexion;

    public function __construct(){

        require_once 'libs/conexion.php';
        $this-> conexion = new conexion;
    }

    public function productos()
    {
        $sql = "SELECT CONCAT(`nombre_producto`, ' Marca: ', `marca_producto`, ' Tipo: ', `tipo_producto`) AS `nombre`, `codigo_producto` AS `id` FROM `productos`";

        $consulta = $this->conexion->get_consulta($sql, null);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();    
    }

    public function inventario()
    {
        $sql = "SELECT `codigo_producto`, `nombre_producto`, `existencias` FROM `productos`";

        $consulta = $this->conexion->get_consulta($sql, null);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();  
    }

    public function producto($id)
    {
        $sql = "SELECT * FROM `productos` WHERE `codigo_producto` = :id";
        $sql_values = [
            ':id'  => $id
        ];

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();  
    }

    public function movimientos($id, $fecha_min, $fecha_max)
    {
        $sql = "SELECT dp.`precio_compra` AS `unitcost`, p.`codigo_proveedor` AS `cliente`, CONCAT('pedido #' ,dp.`codigo_pedido`) as `codigo`, 'Compra' as `tipo`, CONCAT('+', dp.`cantidad`) AS `unidades`, CONCAT('', dp.`subtotal`) AS subtotal, p.`fecha`
		FROM `detalles_pedido` dp INNER JOIN `pedidos` p ON dp.`codigo_pedido` = p.`codigo_pedido` WHERE dp.`codigo_producto` = :id AND p.`fecha` BETWEEN :min AND :max

		UNION ALL

		SELECT  df.`subtotal` / df.`cantidad` AS `unitcost`, f.`ci_cliente` AS `cliente`, CONCAT('factura #' ,df.`codigo_factura`) as `codigo`, 'Venta' as `tipo` , CONCAT('-', df.`cantidad`) AS `unidades`, CONCAT('', df.`subtotal` * 1.16) AS subtotal, f.`fecha_venta` AS `fecha` FROM `detalles_facturacion` df INNER JOIN `facturacion` f ON df.`codigo_factura` = f.`codigo_factura` WHERE df.`codigo_producto` = :id AND f.`fecha_venta` BETWEEN :min AND :max

		ORDER BY `fecha` ASC, `subtotal` DESC, `codigo` DESC";
        $sql_values = [
            ':id'  => $id,
            ':min' => $fecha_min . ' 00:00:00',
            ':max' => $fecha_max . ' 23:59:59'
        ];

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();
    }

    public function detalle_inventario($type, $id, $fecha_min, $fecha_max)
    {
        switch ($type) {
            case 'pedido':

                $sql = "SELECT SUM(DISTINCT dp.subtotal) AS `total`, SUM(DISTINCT dp.cantidad) AS `cantidad` FROM `detalles_pedido` AS dp JOIN `pedidos` AS p WHERE dp.`codigo_producto` = :id AND p.`fecha` BETWEEN :min AND :max";
                break;

            case 'factura':
                $sql = "SELECT SUM(DISTINCT df.subtotal) * 1.16 AS `total`, SUM(DISTINCT df.cantidad) AS `cantidad` FROM `detalles_facturacion` AS df JOIN `facturacion` AS f WHERE df.`codigo_producto` = :id AND f.`fecha_venta` BETWEEN :min AND :max";
                break;

        }

        $sql_values = [
            ':id'  => $id,
            ':min' => $fecha_min . ' 00:00:00',
            ':max' => $fecha_max . ' 23:59:59'
        ];

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();
    }

    public function pedido($fecha_min, $fecha_max)
    {
        $sql = "SELECT * FROM `pedidos` WHERE `fecha` BETWEEN :min AND :max ORDER BY `fecha` ASC";
        $sql_values = [
            ':min' => $fecha_min . ' 00:00:00',
            ':max' => $fecha_max . ' 23:59:59'
        ];

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();
    }
    
    public function detalle_pedido($id)
    {
        $sql_values = [
            ':id' => $id
        ];
        $sql = "SELECT COUNT(`codigo_pedido`) AS `cantidad`, SUM(`cantidad`) AS `unidades` FROM `detalles_pedido` WHERE `codigo_pedido` = :id";

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }
   
        return $datos;
        $conexion -> desconectar();
    }

    public function factura($fecha_min, $fecha_max)
    {
        $sql = "SELECT * FROM `facturacion` WHERE `fecha_venta` BETWEEN :min AND :max ORDER BY `fecha_venta` ASC";
        $sql_values = [
            ':min' => $fecha_min . ' 00:00:00',
            ':max' => $fecha_max . ' 23:59:59'
        ];

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }

        return $datos;
        $conexion -> desconectar();

    }
    
    public function detalle_factura($id)
    {
        $sql_values = [
            ':id' => $id
        ];
        $sql = "SELECT COUNT(`codigo_factura`) AS `cantidad`, SUM(`cantidad`) AS `unidades` FROM `detalles_facturacion` WHERE `codigo_factura` = :id";

        $consulta = $this->conexion->get_consulta($sql, $sql_values);

        if($consulta->rowCount() > 0){
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
        }else{
            $datos = null;
        }
   
        return $datos;
        $conexion -> desconectar();      
    }

}
