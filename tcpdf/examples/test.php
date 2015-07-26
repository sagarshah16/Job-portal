<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test</title>
</head>
<?php include("./Combo_Values.php");?>
<body>
<div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
        <hr size="1" color="#069"  align="center">
	         <h2>Create Resume</h2>
        <hr size="1" color="#069"  align="center">
             <form action="example_021.php" name="frmupload" method="post" enctype="multipart/form-data">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" style="text-align:left">
                <?php
					if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Enter Degree!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Enter Field of Study!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Enter GPA!</b>";
					else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Select Start Date!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Select End Date!</b>";	
				?>
                </td>
             </tr>
             
             <input type="hidden" name="edu_id" value="<?php if(isset($_POST['edu_id']) && $_POST['edu_id']!="") echo $_POST['edu_id'] ; else echo "";?>">
             <tr>
            	 <td colspan="2" bgcolor="#CCCCCC"><strong>PERSONAL INFORMATION</strong></td>
             </tr>
             <tr>
                <td width="22%" align="left" ><b> <font face="Arial" size="2">Name:</font></b></td>
                <td width="78%" align="left" ><input type="text" name="Name" size="40" style="font-family: Arial; font-size: 10pt" /></td>
             </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Address:<br /><br /><br />City:</font></b></td>
                <td align="left" >
                <input type="text" name="Address1" size="40" style="font-family: Arial; font-size: 10pt" />
				<br />
				<input type="text" name="Address2" size="40" style="font-family: Arial; font-size: 10pt" />
                <br />
				<input type="text" name="City" size="30" style="font-family: Arial; font-size: 10pt" />
                <select type="text" name="state" id="state" >
                <option value="">Select State</option>
					<?php
						if(isset($edu_state) && $edu_state!="0")
						 showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
                     ?>
              	</select>
                Zip:
                <input type="text" name="ZipCode" size="10" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
		    <tr>
				<td align="left" ><b> <font face="Arial" size="2">Phone:</font></b></td>
				<td align="left" ><input type="text" name="Phone" size="10" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
				<td align="left" ><b> <font face="Arial" size="2">E-Mail Address:</font></b></td>
                <td align="left" ><input type="text" name="Email" size="40" tabindex="8" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
 			<tr>
             	<td colspan="2"   bgcolor="#CCCCCC"><strong>OBJECTIVE</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="objective" id="objective" rows="4" cols="80" value=""></textarea> </td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
                <td colspan="2"  bgcolor="#CCCCCC"><strong>PROFESSIONAL WORK HISTORY</strong>            	 </td>
           	</tr>
           	<tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 1:</font></b></td>
                <td  align="left" ><input type="text" name="Employer1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City1" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate1" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate1" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate1" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties1" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
            <tr>
                <td  height="20" align="center" colspan="2"><hr width="80%" noshade="noshade" color="#000000" /></td>
                
            </tr>

            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 2:</font></b></td>
                <td  align="left" ><input type="text" name="Employer2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City2" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate2" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate2" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate2" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties2" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
            <tr>
                <td  height="20" align="center" colspan="2"><hr width="80%" noshade="noshade" color="#000000" /></td>
            </tr>

             <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 3:</font></b></td>
                <td  align="left" ><input type="text" name="Employer3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City3" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate3" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate3" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate3" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties3" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
                
           </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
                <td colspan="2"  bgcolor="#CCCCCC"><strong>EDUCATIONAL BACKGROUND</strong>            	 </td>
           	</tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">School 1:</font></b></td>
                <td align="left" ><input type="text" name="School1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity1" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate1" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree1" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
                <td align="center" colspan="2" height="20"><hr noshade="noshade" color="#000000" width="80%" /></td>
            </tr>
			<tr>
                <td align="left" ><b> <font face="Arial" size="2">School 2:</font></b></td>
                <td align="left" ><input type="text" name="School2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity2" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate2" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree2" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
                <td align="center" colspan="2" height="20"><hr noshade="noshade" color="#000000" width="80%" /></td>
            </tr>
              <tr>
                <td align="left" ><b> <font face="Arial" size="2">School 3:</font></b></td>
                <td align="left" ><input type="text" name="School3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity3" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate3" id="state" >
						<option value="">Select State</option>
						<?php
						if(isset($edu_state) && $edu_state!="0")
						showStateOptionsDrop($states_arr, $edu_state, true);
						else
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree3" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
           <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>SPECIAL TRAINING</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="specialtraining" id="specialtraining" rows="4" cols="80" value=""><?php if(isset($specialtraining) && $specialtraining!="")echo $specialtraining;?></textarea> </td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>HONORS & AWARDS</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="honers" id="honers" rows="4" cols="80" value=""><?php if(isset($honers) && $honers!="")echo $honers;?></textarea> </td>
			</tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>ADDITIONAL INFORMATION</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="additional" id="additional" rows="4" cols="80" value=""><?php if(isset($additional) && $additional!="")echo $additional;?></textarea> </td>
			</tr>
             
            </table>
            
            <div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
             <?php	if(isset($_POST['edu_id']) && $_POST['edu_id']!=""){	?>
            <a class="button" name="cancel" value="Cancel" href="jsviewprofile.php" />Cancel</a>
             <?php } else { ?>
            <a class="button" name="reset" value="Reset" href="jseducation.php" />Reset</a>
             <?php } ?>
             </div>
             
          </form>
      	</div>
      </div>
</body>
</html>
