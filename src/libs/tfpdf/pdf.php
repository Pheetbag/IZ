<?php

require('tfpdf.php');

class PDF extends tFPDF
{

    public $title    = '';
    public $subtitle = '';

        // Cabecera de página
    function Header()
    {

        $this->SetFont('Arial','B',50);
        // logo
        $this->Cell(50, 20, 'IZ', 0, 0, 'C');
        // Título
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',10);
        $this->Cell(null,5,'Inversiones Zamora MKS, C. A.',0,1,'L');
        $this->Cell(50,null,'',0);
        $this->Cell(null,5,'Sistema integrado de inventario',0,1,'L');
        $this->Cell(50,null,'',0);
        $this->Cell(null,5,$this->title,0,1,'L');
        $this->Cell(50,null,'',0);
        $this->Cell(null,5,$this->subtitle,0,1,'L');
        $this->Ln(5);
    }

    function Table($header, $rows, $w = 45, $h = 5)
    {
        $piles = count($header);

                // Add a Unicode font (uses UTF-8)
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',10);
        $this->SetFillColor(100);
        $this->SetTextColor(255);
        for ($i=0; $i < $piles; $i++)
        { 
            
            $this->Cell($w, $h+2, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFillColor(220);
        $this->SetTextColor(0);
        $this->SetFont('DejaVu','',9);

        $fill = true;
        foreach ($rows as $row) {
            
            foreach ($row as $cell)
            {
                $this->Cell($w,$h, $cell . '','LR', 0, 'L', $fill);
            }

            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->Cell($w * $piles,0,'','T');

    }

    function FinalTable($header, $cells, $w = array(45, 45), $cellszise = 45, $cellsq = 6, $h = 5)
    {

        $offset = ($cellszise * $cellsq) - array_sum($w);
        $this->Cell($offset, $h+2, '', 0, 0);

        $this->SetFillColor(0);
        $this->SetTextColor(255);
        $this->SetFont('DejaVu','',10);

        for ($i=0; $i < 2; $i++)
        { 
            $this->Cell($w[$i], $h+2, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();

        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('DejaVu','',9);

        $this->Cell($offset, $h, '', 0, 0);

        for ($i=0; $i < count($cells); $i++) { 
            $this->Cell($w[$i], $h, $cells[$i] . '','LR', 0, 'L');
        }

        $this->Ln();
        $this->Cell($offset, $h, '', 0, 0);
        $this->Cell(array_sum($w),0,'','T');
    }

}