<?php ob_start(); ?>
<?php
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+



require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
		
		if(isset($_POST['objective']))
			$objective=$_POST['objective'];
		if(isset($_POST['JobTitle1']))
			$JobTitle1=$_POST['JobTitle1'];
		if(isset($_POST['Employer1']))
			$Employer1=$_POST['Employer1'];
		if(isset($_POST['City1']))
			$City1=$_POST['City1'];
		if(isset($_POST['empstate1']))
			$empstate1=$_POST['empstate1'];
		if(isset($_POST['FromDate1']))
			$FromDate1=$_POST['FromDate1'];
		if(isset($_POST['ThruDate1']))
			$ThruDate1=$_POST['ThruDate1'];			
		if(isset($_POST['Duties2']))
			$Duties2=$_POST['Duties2'];		
		if(isset($_POST['JobTitle2']))
			$JobTitle2=$_POST['JobTitle2'];
		if(isset($_POST['Employer2']))
			$Employer2=$_POST['Employer2'];
		if(isset($_POST['City2']))
			$City2=$_POST['City2'];
		if(isset($_POST['empstate2']))
			$empstate2=$_POST['empstate2'];
		if(isset($_POST['FromDate2']))
			$FromDate2=$_POST['FromDate2'];
		if(isset($_POST['ThruDate2']))
			$ThruDate2=$_POST['ThruDate2'];			
		if(isset($_POST['Duties2']))
			$Duties2=$_POST['Duties2'];	
		if(isset($_POST['JobTitle3']))
			$JobTitle3=$_POST['JobTitle3'];
		if(isset($_POST['Employer3']))
			$Employer3=$_POST['Employer3'];
		if(isset($_POST['City3']))
			$City3=$_POST['City3'];
		if(isset($_POST['empstate3']))
			$empstate3=$_POST['empstate3'];
		if(isset($_POST['FromDate3']))
			$FromDate3=$_POST['FromDate3'];
		if(isset($_POST['ThruDate3']))
			$ThruDate3=$_POST['ThruDate3'];			
		if(isset($_POST['Duties3']))
			$Duties3=$_POST['Duties3'];	
		if(isset($_POST['School1']))
			$School1=$_POST['School1'];	
		if(isset($_POST['SchoolCity1']))
			$SchoolCity1=$_POST['SchoolCity1'];	
		if(isset($_POST['schoolstate1']))
			$schoolstate1=$_POST['schoolstate1'];	
		if(isset($_POST['SchoolDegree1']))
			$SchoolDegree1=$_POST['SchoolDegree1'];	
		if(isset($_POST['School2']))
			$School2=$_POST['School2'];	
		if(isset($_POST['SchoolCity2']))
			$SchoolCity2=$_POST['SchoolCity2'];	
		if(isset($_POST['schoolstate2']))
			$schoolstate2=$_POST['schoolstate2'];	
		if(isset($_POST['SchoolDegree2']))
			$SchoolDegree2=$_POST['SchoolDegree2'];	
		if(isset($_POST['School3']))
			$School3=$_POST['School3'];	
		if(isset($_POST['SchoolCity3']))
			$SchoolCity3=$_POST['SchoolCity3'];	
		if(isset($_POST['schoolstate3']))
			$schoolstate3=$_POST['schoolstate3'];	
		if(isset($_POST['SchoolDegree3']))
			$SchoolDegree3=$_POST['SchoolDegree3'];	
		if(isset($_POST['specialtraining']))
			$specialtraining=$_POST['specialtraining'];	
		if(isset($_POST['honers']))
			$honers=$_POST['honers'];	
		if(isset($_POST['additional']))
			$additional=$_POST['additional'];
		else
		 $_POST['additional']="";
		
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mayur Vandra');
$pdf->SetTitle('Resume Creator');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data

$pdf->SetHeaderData("", PDF_HEADER_LOGO_WIDTH, "", PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

// create some HTML content
$html="";

if (isset($objective) && $objective!="")
	$html = '<h3>OBJECTIVE:</h3><br />'.$objective.'<br /><br />';
if ((isset($JobTitle1) && $JobTitle1!="") || (isset($JobTitle2) && $JobTitle2!="") || (isset($JobTitle3) && $JobTitle3!=""))
	$html .= '<h3>PROFESSIONAL WORK HISTORY:</h3><br />';
if (isset($JobTitle1) && $JobTitle1!="")
	$html.= '<b>'.$JobTitle1.',&nbsp;</b>';
if (isset($Employer1) && $Employer1!="")
	$html .= '<b><i>'.$Employer1.'</i></b>,&nbsp;';
if (isset($City1) && $City1!="")
	$html .= $City1.',&nbsp;';
if (isset($$empstate1) && $$empstate1!="")
	$html .= $empstate1.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
if (isset($FromDate1) && $FromDate1!="")
	$html .= $FromDate1.'&nbsp;to&nbsp;';
if (isset($ThruDate1) && $ThruDate1!="")
	$html .= $ThruDate1.'<br /><br/>&nbsp;';
if (isset($Duties1) && $Duties1!="")
	$html .= $Duties1.'<br/><br/><br />';
if (isset($JobTitle2) && $JobTitle2!="")
	$html.= '<b>'.$JobTitle2.',&nbsp;</b>';
if (isset($Employer2) && $Employer2!="")
	$html .= '<b><i>'.$Employer2.'</i></b>,&nbsp;';
if (isset($City2) && $City2!="")
	$html .= $City2.',&nbsp;';
if (isset($$empstate2) && $$empstate2!="")
	$html .= $empstate2.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
if (isset($FromDate2) && $FromDate2!="")
	$html .= $FromDate2.'&nbsp;to&nbsp;';
if (isset($ThruDate2) && $ThruDate2!="")
	$html .= $ThruDate2.'<br /><br/>&nbsp;';
if (isset($Duties2) && $Duties2!="")
	$html .= $Duties2.'<br/><br/><br />';
if (isset($JobTitle3) && $JobTitle3!="")
	$html.= '<b>'.$JobTitle3.',&nbsp;</b>';
if (isset($Employer3) && $Employer3!="")
	$html .= '<b><i>'.$Employer3.'</i></b>,&nbsp;';
if (isset($City3) && $City3!="")
	$html .= $City3.',&nbsp;';
if (isset($$empstate3) && $$empstate3!="")
	$html .= $empstate3.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
if (isset($FromDate3) && $FromDate3!="")
	$html .= $FromDate3.'&nbsp;to&nbsp;';
if (isset($ThruDate3) && $ThruDate3!="")
	$html .= $ThruDate3.'<br /><br/>&nbsp;';
if (isset($Duties3) && $Duties3!="")
	$html .= $Duties3.'<br/><br/><br />';
if ((isset($School1) && $School1!="") || (isset($School2) && $School2!="") || (isset($School3) && $School3!=""))
	$html .= '<h3>EDUCATIONAL BACKGROUND:</h3><br />';
if ((isset($School1) && $School1!=""))
	$html .= '<b>'.$School1.',&nbsp;</b>';
if (isset($SchoolCity1) && $SchoolCity1!="")
	$html .= $SchoolCity1.',&nbsp;';
if (isset($schoolstate1) && $schoolstate1!="")
	$html .= $schoolstate1.'<br/>';
if (isset($SchoolDegree1) && $SchoolDegree1!="")
	$html .= $SchoolDegree1.'<br/><br /><b>';
if ((isset($School2) && $School2!=""))
	$html .= '<b>'.$School2.',&nbsp;</b>';
if (isset($SchoolCity2) && $SchoolCity2!="")
	$html .= $SchoolCity2.',&nbsp;';
if (isset($schoolstate2) && $schoolstate2!="")
	$html .= $schoolstate2.'<br/>';
if (isset($SchoolDegree2) && $SchoolDegree2!="")
	$html .= $SchoolDegree2.'<br/><br /><b>';
if ((isset($School3) && $School3!=""))
	$html .= '<b>'.$School3.',&nbsp;</b>';
if (isset($SchoolCity3) && $SchoolCity3!="")
	$html .= $SchoolCity3.',&nbsp;';
if (isset($schoolstate3) && $schoolstate3!="")
	$html .= $schoolstate3.'<br/>';
if (isset($SchoolDegree3) && $SchoolDegree3!="")
	$html .= $SchoolDegree3.'<br/><br /><b>';
if (isset($specialtraining) && $specialtraining!="")
	{$html .= '<h3>SPECIAL TRAINING:</h3><br />';
	$html .= $specialtraining.'<br /><br />';}
if (isset($honers) && $honers!="")
	$html .= '<h3>HONORS & AWARDS:</h3><br />'.$honers .'<br /><br />';
if (isset($additional) && $additional!="")
	$html .= '<h3>ADDITIONAL INFORMATION:</h3><br />'.$additional .'<br /><br />';
else
	$additional = "";


// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Resume.pdf', 'D');

//============================================================+
// END OF FILE                                                
//============================================================+
