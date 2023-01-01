<?php
   
    require("fpdf/fpdf.php");
    $db=new PDO("mysql:host=localhost;dbname=tournage", "root", "mysql");
   session_start();
    class myPDF extends FPDF
    {
   
    function header()
    {
    $this->SetFont("Arial","B",14);
            $this->Cell(10,10,"Sequences",'C');
            $this->Ln(20);
            $this->Cell(5,5,"liste des Sequences:",'C');
            $this->ln();
    }
    function headertable()
    {
    $this->SetFont('Times','B',12);
    $this->Cell(40,10,'Sequence',1,0,'C');
    $this->Cell(40,10,'Nom acteur',1,0,'C');
    $this->Cell(40,10,'Nom personnage',1,0,'C');
    $this->Cell(40,10,'Numero costume ',1,0,'C');
    $this->ln();
    }
    function viewsTable($db)
    {

    $this->SetFont('times','',12);        
    $stmt = $db->query("SELECT sequence.nom, acteur.nom_acteur,acteur.nom_personnage,costume.numero_costume FROM sequence,acteur,costume,seq_act_cost WHERE seq_act_cost.id_ep = '".$_GET['ideq']."' and  seq_act_cost.id_seq = sequence.id and seq_act_cost.id_act =acteur.id and seq_act_cost.id_cost =costume.id ");
        while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
       $this->Cell(40,10,$data->nom,1,0,'C');
       $this->Cell(40,10,$data->nom_acteur,1,0,'L');
       $this->Cell(40,10,$data->nom_personnage,1,0,'L');
       $this->Cell(40,10,$data->numero_costume,1,0,'L');
       $this->ln();
            }

    }
    }
    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headertable();
    $pdf->viewsTable($db);
    $pdf->output("Sequences.pdf", "D");


?>