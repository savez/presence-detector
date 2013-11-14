<?php

class MYTCPDF extends TCPDF {
	public $_data;

    public function Header() {
        // Position at 15 mm from bottom
        //$this->SetY(5);
        // Set font
        $this->SetFont('Times', 'I', 10);
        $this->Cell(0, 15, "", 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->Ln(5);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-40);
        // Set font
        $this->SetFont('Times', 'I', 8);
        // Page number
        $x = $this->GetX();
        $this->Cell(0, 15, "Firma", 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetX($x);
        $this->Cell(0, 15, "Firma Azienda", 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
?>