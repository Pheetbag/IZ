<?php

global $consultar;

class reportes{


	public $permisos  = [
		'reportes' => '2'
	];

    public $vista = 'vistas/reportes/';

    public function index()
    {
        global $consultar;
        $productos = $consultar->productos();
        require $this->vista . 'index.php';
    }

    public function p()
    {
        $_GET['fmin']     = '2010-04-12';
        $_GET['fmax']     = '2019-04-12';
        $_GET['producto'] = '1'; 
        $this->imprimir('producto');
    }

    public function imprimir($type)
    {
        if(!isset($_GET['fmin']) OR!isset($_GET['fmax']))
        { header('location:' . HTTP . '/reportes'); }

        switch ($type) {
            case 'pedido':
                
                echo $this->generar_pedido($_GET['fmin'], $_GET['fmax']);
                break;

            case 'factura':
            
                echo $this->generar_factura($_GET['fmin'], $_GET['fmax']);
                break;

            case 'inventario':

                echo $this->generar_inventario($_GET['fmin'], $_GET['fmax']);
                break;

            case 'producto':

                if(!isset($_GET['producto']))
                { header('location:' . HTTP . '/reportes'); }

                echo $this->generar_producto($_GET['fmin'], $_GET['fmax'], $_GET['producto']);
                break;

            default:
                header('location:' . HTTP . '/reportes');
                break;
        }
    }

    public function generar_producto($fecha_min, $fecha_max, $id)
    {
        global $consultar;
        $producto = $consultar->producto($id);
        $detalles = $consultar->movimientos($id, $fecha_min, $fecha_max);

        $rows     = array();

        for ($i=0; $i < count($detalles); $i++)
        { 
            $row     = array();
            $detalle = $detalles[$i];

            $row[]  = $detalle['tipo']; 
            $row[]  = $detalle['codigo'];
            $row[]  = $detalle['fecha'];
            $row[]  = $detalle['cliente'];
            $row[]  = number_format( $detalle['subtotal'] ,2,',', '.');
            $row[]  = number_format( $detalle['unitcost']  ,2,',', '.');
            $row[]  = $detalle['unidades'];

            $rows[] = $row; 
        }

        require('libs/tfpdf/pdf.php');
        $pdf = new PDF('L');
        $pdf->title    = 'Reporte de producto';
        $pdf->subtitle = 'Periodo: ' . date('d/m/Y', strtotime($fecha_min)) . ' - ' . date('d/m/Y', strtotime($fecha_max)); 

        $pdf->AddPage();

        $pdf->Ln(10); 
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(null, 6, $producto['nombre_producto'], 0, 1);
        $pdf->Cell(null, 6, 'Marca: ' . $producto['marca_producto'], 0, 1);
        $pdf->Cell(null, 6, 'Tipo: ' . $producto['tipo_producto'], 0, 1);
        $pdf->Ln(5); 
        $pdf->SetFont('DejaVu','',12);
        $pdf->Cell(null, 8, 'Operaciones de el producto', 1, 1, 'C');
        $pdf->Ln(5); 

        $pdf->Table(array('Tipo', '# de operación', 'Fecha', 'Cliente/Empresa', 'Monto (Bs.S)', 'Costo unitario (Bs.S)', 'Unidades'), 
        $rows, 39.5);

        $pdf->output();  

    }

    public function generar_inventario($fecha_min, $fecha_max)
    {
        global $consultar;
        $productos = $consultar->inventario();

        $rows      = array();
        $total_c   = 0;
        $total_v   = 0;

        for ($i=0; $i < count($productos); $i++)
        {
            $row          = array();
            $producto     = $productos[$i];
            $pedidos      = $consultar->detalle_inventario('pedido' , $producto['codigo_producto'], $fecha_min, $fecha_max);
            $facturas     = $consultar->detalle_inventario('factura', $producto['codigo_producto'], $fecha_min, $fecha_max);
            $existencias  = ($producto['existencias'] + $pedidos['cantidad']) - $facturas['cantidad'];
            $total_c     += $pedidos['total'];
            $total_v     += $facturas['total'];
            
            $row[]  = $producto['nombre_producto']; 
            $row[]  = $facturas['cantidad'];
            $row[]  = $pedidos['cantidad'];
            $row[]  = $producto['existencias']; 
            $row[]  = $existencias;
            $row[]  = number_format( $facturas['total']  ,2,',', '.');
            $row[]  = number_format( $pedidos['total']  ,2,',', '.');

            $rows[] = $row;
        }

        require('libs/tfpdf/pdf.php');
        $pdf = new PDF('L');
        $pdf->title    = 'Reporte de inventario';
        $pdf->subtitle = 'Periodo: ' . date('d/m/Y', strtotime($fecha_min)) . ' - ' . date('d/m/Y', strtotime($fecha_max)); 

        $pdf->AddPage();
        $pdf->Table(array('Producto', 'Vendidos', 'Pedidos', 'Existencia inicial', 'Existencia final', 'Ventas (Bs.S)', 'Compras (Bs.S)'), 
        $rows, '38');

        $pdf->Ln(10); 

        $pdf->FinalTable(array('Total ventas (Bs.S)', 'Total compras (Bs.S)'),
        array(number_format( $total_v  ,2,',', '.'), number_format( $total_c  ,2,',', '.')),
        array(38,38), 38, 7);

        $pdf->output();

    }

    public function generar_pedido($fecha_min, $fecha_max)
    {
        global $consultar;
        $pedidos = $consultar->pedido($fecha_min, $fecha_max);

        $rows      = array();
        $total     = 0;
        $uni_total = 0;

        for ($i=0; $i < count($pedidos); $i++)
        {
            $row       = array();
            $pedido    = $pedidos[$i];
            $detalles  = $consultar->detalle_pedido($pedido['codigo_pedido']);
            $total    += $pedido['subtotal'];
            $unidades  = 0;

             $uni_total += $unidades += $detalles['unidades'];

            
            $row[]  = date('d/m/Y', strtotime($pedido['fecha'])); 
            $row[]  = $pedido['codigo_pedido'];
            $row[]  = $pedido['codigo_proveedor'];
            $row[]  = $detalles['cantidad'];
            $row[]  = $unidades;
            $row[]  = number_format( $pedido['subtotal']  ,2,',', '.');

            $rows[] = $row;
        }


        require('libs/tfpdf/pdf.php');
        $pdf = new PDF('L');
        $pdf->title    = 'Reporte de pedidos';
        $pdf->subtitle = 'Periodo: ' . date('d/m/Y', strtotime($fecha_min)) . ' - ' . date('d/m/Y', strtotime($fecha_max)); 

        $pdf->AddPage();
        $pdf->Table(array('Fecha', 'Codigo', 'Proveedor', 'Productos', 'Unidades totales', 'Costo total (Bs.S)'), 
        $rows);

        $pdf->Ln(10); 

        $pdf->FinalTable(array('Unidades totales', 'Costo total'),
        array($uni_total, number_format( $total  ,2,',', '.')));

        $pdf->output();
    }

    public function generar_factura($fecha_min, $fecha_max)
    {
        global $consultar;
        $facturas  = $consultar->factura($fecha_min, $fecha_max);

        $rows      = array();
        $total     = 0;
        $uni_total = 0;

        for ($i=0; $i < count($facturas); $i++)
        {
            $row       = array();
            $factura   = $facturas[$i];
            $detalles  = $consultar->detalle_factura($factura['codigo_factura']);
            $total    += $factura['total'];
            $unidades  = 0;

             $uni_total += $unidades += $detalles['unidades'];

            
            $row[]  = date('d/m/Y', strtotime($factura['fecha_venta'])); 
            $row[]  = $factura['codigo_factura'];
            $row[]  = $factura['ci_cliente'];
            $row[]  = $detalles['cantidad'];
            $row[]  = $unidades;
            $row[]  = number_format( $factura['total']  ,2,',', '.');

            $rows[] = $row;
        }


        require('libs/tfpdf/pdf.php');
        $pdf = new PDF('L');
        $pdf->title    = 'Reporte de facturación';
        $pdf->subtitle = 'Periodo: ' . date('d/m/Y', strtotime($fecha_min)) . ' - ' . date('d/m/Y', strtotime($fecha_max)); 

        $pdf->AddPage();
        $pdf->Table(array('Fecha', 'Codigo', 'Cliente', 'Productos', 'Unidades totales', 'Total (Bs.S)'), 
        $rows);

        $pdf->Ln(10); 

        $pdf->FinalTable(array('Unidades totales', 'Ventas totales (Bs.S)'),
        array($uni_total, number_format( $total  ,2,',', '.')));

        $pdf->output();
    }


}
