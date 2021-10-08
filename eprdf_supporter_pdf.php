<?PHP 
     include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	sec_session_start();

if (login_check($mysqli) == true) : 
require('includes/tfpdf.php');
if(isset($_GET['field']))
 if(isset($_GET['val']))
	$sql = "SELECT 
		`ID`, `First_Name`,`Middle_Name`,`Last_Name`, `Sex`, `Age`, `Education`, `Field_Of_Job`, `Support_Party`,`Supporter_Status`,`Supporter_Year`
					FROM `EPRDF_supporter` 
					WHERE ".$_GET['field']." like ".$_GET['val']." 
					ORDER BY ID ASC ";
	$array = array();
	class PDF extends tFPDF{
	private $PG_W = 190;		
		function Header(){// Page header
			$this->Image('images/pp logo.png',5,5,10);// Logo - (Horizontal, Vertical, Size)
			$this->SetFont('Times','B',16);// Arial bold 15
			$this->Cell(15);// Move to the right
			//$this->Cell(60,10,'List Of Trainees',1,0,'C');// Title   
            $this->Cell($this->PG_W,4,"Prosperity Party Supporter Report", 0, 0, '');			
			//$this->Ln(20);// Line break			
			$this->SetFont('Times', 'B', 16);
			$this->SetFont('Times','BI',18);// Arial bold 15
			//$this->Cell($this->PG_W, 8, "Meles Zenawi Leadership Academy Trainees Report", 0, 0, 'C');
			//$this->Ln();
			
			//$this->Cell($this->PG_W, 5, "REPORT", 0, 0, 'C','');
			//echo "<hr>";
			$this->Ln(10);
			
			$this->SetFont('times', 'BI', 10);
			
			$this->Cell($this->PG_W / 4, 5, "Report Time:", 0, 0, 'L');
			//$this->Cell($this->PG_W / 4, 5, time("s/m/h", time()), 0, 0, 'L');
			$this->Cell($this->PG_W / 4, 5, "Web Portal:", 0, 0, 'L');
			$this->Cell($this->PG_W / 4, 5, "www.eprdf.org.et", 0, 0, 'L');		

			$this->Ln();
			
			$this->Cell($this->PG_W / 4, 5, "Report Date:", 0, 0, 'L');
			$this->Cell($this->PG_W / 4, 5, date("d/m/Y", time()), 0, 0, 'L');		
			$this->Cell($this->PG_W / 4, 5, "Address:", 0, 0, 'L');
			$this->MultiCell($this->PG_W / 4, 5, "Arate Kilo\nAddis Abeba, Ethiopia", 0, 'L');		
			
			$this->Ln(10);

		}
		
		function Footer(){// Page footer
			$this->SetY(-15);// Position at 1.5 cm from bottom
			$this->SetFont('Arial','I',6);// Arial italic 8
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');// Page number
			// Footer address
			$address = "\nEPRDF \n Addis Ababa, Ethiopia";
			$this->SetY(-((count(explode("\n", $address)) * 5) + 20));
			$this->SetFont('Arial', '', 7);
			$this->Ln();
			$lines = explode("\n", $address);
			foreach ($lines as $line) {
				$this->Cell($this->PG_W, 5, $line, 0, 0, 'C');
				$this->Ln(4);	
			}
		}
		function BasicTable($header, $data){// Simple table
			foreach($header as $col)// Header
				$this->Cell(20,7,$col,1);
			$this->Ln();
			$this->AddFont('jiret','','jiret.ttf',true);
			$this->SetFont('jiret','',8);
			foreach($data as $row){// Data
				foreach($row as $col)
					$this->Cell(20,6,$col,1);
				$this->Ln();
			}
		}
		function ImprovedTable($header1, $data){// Better table
			$w = array(10, 25, 25, 25, 5,10, 25,20, 25,15,10);// Column widths
			for($i=0;$i<COUNT($header1);$i++)// Header
				$this->Cell($w[$i],7,$header1[$i],1,0,'C');
			$this->Ln();
			foreach($data as $row){// Data
				$i=0;
				foreach($row as $col){
					IF($i<COUNT($header1))
						$this->Cell($w[$i],7,$col,'LR');
					$i++;
				}
				$this->Ln();
			}
			$this->Cell(array_sum($w),0,'','T');// Closing line
		}		
		function FancyTable($header1, $data){// Colored table
			$this->SetFillColor(1,0,0);// Colors, line width and bold font
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			$w = array(10, 25, 25, 25, 8,10, 25,20, 25,15,10);// Header
			for($i=0;$i<count($header1);$i++)
				$this->Cell($w[$i],6,$header1[$i],1,0,'C',true);
			$this->Ln();
			$this->SetFillColor(224,235,255);// Color and font restoration
			$this->SetTextColor(0);
			$this->SetFont('');
			$this->AddFont('jiret','','jiret.ttf',true);
			$this->SetFont('jiret','',8);
			$fill = false;// Data
			foreach($data as $row){
				$i=0;
				foreach($row as $col){
					IF($i<COUNT($header1))
						$this->Cell($w[$i],6,$col,'LR',0,'L',$fill);
					$i++;
				}	    
				$this->Ln();
				$fill = !$fill;
			}
			$this->Cell(array_sum($w),0,'','T');// Closing line
			$this->Ln(10);
			$num_of_records = 0;
			foreach($data as $row){
				$num_of_records++;
			}		    
			$this->Ln();
			
			$this->SetFont('Arial',  'B', 9);			
			$this->Cell($w[0]+$w[1]+$w[2]+$w[3]+$w[4]+$w[5]+$w[6]+$w[7] , 6, 'Total Number of Prosperity Party Supporter', 'TBI', 0, 'L');
			$this->SetFont('Courier', '', 8);
			$this->Cell($w[8], 6, number_format($num_of_records, 0), 'TB', 0, 'R');//number_format(#,decimalplace)
			$this->Ln(10);
			/*
			
			//$this->SetFont('Arial', 'B', 9);			
			//$this->Cell($this->PG_W, 5, "Details 1:", 0, 0, 'L');			//uncomment these if you want to add 
			//$this->Ln();													//description of your report!@Getnet
			$this->SetFont('Arial', '', 9);			
			$this->Cell($this->PG_W, 5, "Payment Terms: " . "On Receipt", 0, 0, 'L');
			$this->Ln(10);
			
			//$this->SetFont('Arial', 'B', 9);			
			//$this->Cell($this->PG_W, 5, "Detail 2:", 0, 0, 'L');  		//uncomment these if you want to add yet another
			//$this->Ln();													//description of your report!@Getnet
			$this->SetFont('Arial', '', 9);			
			$this->Cell($this->PG_W, 5, "Please make cheques payable to Roxxor Ltd.", 0, 0, 'L');
			$this->Ln(10);		
			
			$this->SetFont('Arial', 'B', 9);			
			$this->Cell($this->PG_W, 5, "Detail 3:", 0, 0, 'L');
			$this->Ln();
			$this->SetFont('Arial', '', 9);			
			$this->Cell($this->PG_W, 5, "Bank A/C No: 000000000", 0, 0, 'L');
			$this->Ln(10);	
    */			
		}
	}

	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE); //HOST,USER,PASSWORD,DATABASE are declared globaly in db_connect.php
	 $conn->query("SET NAMES 'utf8'");
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}
	$result = mysqli_query($conn,$sql) or die(mysql_error());
	
	$pdf = new PDF();// Instanciation of inherited class
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',11);
	$header = array('ID','First Name','Middle Name','Last Name','Sex','Age','Education','Job','Support Party','Status','Year');

	while($row = mysqli_fetch_assoc($result)) {
		$array1[] = $row;
	}
	$pdf->FancyTable($header,$array1);

	$pdf->Output('EPRDF_supporter_pdf.pdf','I');
	

else : 
	header('Location: ./index.php');
endif; 
?>
