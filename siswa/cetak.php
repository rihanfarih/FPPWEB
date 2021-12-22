<?php 
include("config.php"); 
require "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=pendaftaran_siswa','root','');

class myPDF extends FPDF {
    function header(){
        $this->SetFont('Arial' ,'B' ,14);
        $this->Cell(276,5,'JADWAL PELAJARAN',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,5,'SMK Coding PWEB A',0,0,'C');
        $this-> Ln(20);
    }

    function footer()
    {
        $this->SetY(-10);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times','',12);
        $this->Cell(20,10,'id',1,0,'C');
        $this->Cell(40,10,'Mata Pelajaran',1,0,'C');
        $this->Cell(40,10,'Hari',1,0,'C');
        $this->Cell(40,10,'Jam Mulai',1,0,'C');
        $this->Cell(40,10,'Jam Selesai',1,0,'C');
        $this->Cell(40,10,'Ruangan',1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt  =$db->query('select * from jadwal');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(20,10,$data->id,1,0,'C');
            $this->Cell(40,10,$data->mata_pelajaran,1,0,'L');
            $this->Cell(40,10,$data->hari,1,0,'L');
            $this->Cell(40,10,$data->jam_mulai,1,0,'L');
            $this->Cell(40,10,$data->jam_selesai,1,0,'L');
            $this->Cell(40,10,$data->ruangan,1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();














?>