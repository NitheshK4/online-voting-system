<?php
/*
EDIT.PHP
Allowsusertoeditspecificentryindatabase
*/
//createstheeditrecordform
//sincethisformisusedmultipletimesinthisfile,Ihavemadeitafunctionthat
iseasilyreusable
functionrenderForm($candidateID,$studnum,$fname,$lname,$gender,$course,$yearlvl,
$position,$partylist,$image,$error)
{
?>
<!DOCTYPEHTMLPUBLIC"-//W3C//DTDHTML4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
EditRecord</title>
</head>

<body>
<?php
//ifthereareanyerrors,display
themif($error!='')
{
echo'<divstyle="padding:4px;border:1pxsolidred;color:red;">'.$error.'</div>';
}
?>
<tablebgcolor="#bbbbbb"width="50%"border="0"cellspacing="10"cellpadding="5"
valign="center"align="center">
<tr>
<tdwidth="25%"valign="top"align="center">
<formaction=""method="post"onSubmit="returnconfirm('Areyousureyouwant
tosavechanges?')">
<inputtype="hidden"name="candidateID"value="<?phpecho$candidateID;?>"/></td>
<div>
<tr>
<td><strong>CandidateID:</strong><?phpecho$candidateID;?></td>

</tr>
<tr>
<td><strong>StudentNumber:*</strong><td>
</tr>
<tr>
<td><inputtype="text"name="studnum"value="<?phpecho$studnum;?>"/></td>
</tr>
<tr>
<td><strong>FirstName:*</strong></td>
</tr>
<tr>
<td><inputtype="text"name="fname"value="<?phpecho$fname;?>"/></td>
</tr>
<tr>
<td><strong>LastName:*</strong></td>
<tr>
<td><inputtype="text"name="lname"value="<?phpecho$lname;?>"/></td>
</tr>

<tr>
<td><strong>Gender:*</strong></td>
</tr>
<tr>
<td><selectname="gender">
<optionvalue="Male"<?phpif($gender=="Male"){echo"selected";}?>>Male</option>
<optionvalue="Female"<?phpif($gender=="Female"){echo"selected";
}?>>Female</option>
</select></td>
<tr>
<td><strong>Course:*</strong></td>
</tr>
<tr>
<td><selectname="course">
<optionvalue="BachelorofArtsinHistory"<?phpif($course=="Bachelorof
ArtsinHistory"){echo"selected";}?>>BachelorofArtsinHistory</option>
<optionvalue="BachelorofArtsinEconomics"<?phpif($course=="Bachelorofarts
inEconomics"){echo"selected";}?>>BachelorofArtsinEconomics</option>
<optionvalue="BachelorofArtsinPsychology"<?phpif($course=="BachelorofArtsin
Psychology"){echo"selected";}?>>BachelorofArtsinPsychology</option>

<optionvalue="BachelorofArtsinPoliticalScience"<?phpif($course=="Bachelorof
ArtsinPoliticalScience"){echo"selected";}?>>BachelorofArtsinPolitical
Science</option>
<optionvalue="BachelorofArtsinCommunication"<?phpif($course=="BachelorofArts
inCommunication"){echo"selected";}?>>BachelorofArtsinCommunication</option>
<optionvalue="BachelorofArtsinMathematics"<?phpif($course=="BachelorofArtsin
Mathematics"){echo"selected";}?>>BachelorofArtsinMathematics</option>
<optionvalue="BachelorofArtsinSocialWork"<?phpif($course=="BachelorofArts
inSocialWork"){echo"selected";}?>>BachelorofArtsinSocialWork</option>
<optionvalue="BachelorofArtsinBusinessAdministration"<?phpif($course==
"BachelorofArtsinBusinessAdministration"){echo"selected";}?>>Bachelorof
ScienceinBusinessAdministration</option>
<optionvalue="BachelorofScienceinAccountancy"<?phpif($course=="Bachelorof
ScienceinAccountancy"){echo"selected";}?>>BachelorofSciencein
Accountancy</option>
<optionvalue="BachelorofElementaryEducation"<?phpif($course=="Bachelorof
ElementaryEducation"){echo"selected";}?>>BachelorofElementary
Education</option>
<optionvalue="BachelorofSecondaryEducation"<?phpif($course=="Bachelor
ofSecondaryEducation"){echo"selected";}?>>BachelorofSecondary
Education</option>
<optionvalue="BachelorofScienceinLibraryandInformationScience"<?php
if($course=="BachelorofScienceinLibraryand InformationScience"){echo
"selected";}?>>BachelorofScienceinLibraryandInformationScience</option>
<optionvalue="BachelorofScienceinCivilEngineering"<?phpif($course=="Bachelorof
ScienceinCivilEngineering"){echo"selected";}?>>BachelorofScienceinCivil
Engineering</option>
<optionvalue="BachelorofScienceinComputerEngineering"<?phpif($course==
"BachelorofScienceinComputerEngineering"){echo"selected";}?>>Bachelorof
ScienceinComputerEngineering</option>

<optionvalue="BachelorofScienceinElectricalEngineering"<?phpif($course==
"BachelorofScienceinElectricalEngineering"){echo"selected";}?>>Bachelorof
ScienceinElectricalEngineering</option>
<optionvalue="BachelorofScienceinInformationTechnology"<?phpif($course==
"BachelorofScienceinInformationTechnology"){echo"selected";}?>>Bachelorof
ScienceinInformationTechnology</option>
<optionvalue="BachelorofScienceinComputerScience"<?phpif($course=="Bachelor
ofScienceinComputerScience"){echo"selected";}?>>BachelorofScienceinComputer
Science</option>
<optionvalue="BachelorofScienceinInformationSystems"<?phpif($course==
"BachelorofScienceinInformationSystems"){echo"selected";}?>>BachelorofSciencein
InformationSystems</option>
<optionvalue="Two-YearAssociateinComputerTechnology"<?phpif($course==
"Two-YearAssociateinComputerTechnology"){echo"selected";}?>>Two-Year
AssociateinComputerTechnology</option>
<optionvalue="Two-YearRefrigeration&AirconditioningTechnicianCourse"
<?phpif($course=="Two-YearRefrigeration&AirconditioningTechnician
Course"){echo"selected";}?>>Two-YearRefrigeration&Airconditioning
TechnicianCourse</option>
<tr>
<td><strong>Position:*</strong></td>
</tr>
<tr>
<td><selectname="position">
<tr>
<td><strong>Image:*</strong></td>
</body>

</html>
<?php
}
//connecttothe
database
include('dbcon.php');
//checkiftheformhasbeensubmitted.Ifithas,processtheformandsaveitto
thedatabaseif(isset($_POST['submit']))
{
//confirmthatthe'id'valueisavalidintegerbeforegettingthe
formdataif(is_numeric($_POST['candidateID']))
{
//getformdata,makingsureitisvalid
$candidateID=$_POST['candidateID'];
$studnum=mysql_real_escape_string(htmlspecialchars($_POST['studnum']));
$fname=mysql_real_escape_string(htmlspecialchars($_POST['fname']));
$lname=mysql_real_escape_string(htmlspecialchars($_POST['lname']));
$gender=mysql_real_escape_string(htmlspecialchars($_POST['gender']));

$course=mysql_real_escape_string(htmlspecialchars($_POST['course']));
$yearlvl=mysql_real_escape_string(htmlspecialchars($_POST['yearlvl']));
$position=mysql_real_escape_string(htmlspecialchars($_POST['position']));
$partylist=mysql_real_escape_string(htmlspecialchars($_POST['partylist']));
$image=mysql_real_escape_string(htmlspecialchars($_POST['image']));
//checkthatfirstname/lastnamefieldsarebothfilledin
if($candidateID==''||$studnum==''||$fname==''||$lname==''||$gender==''||
$course==''||$yearlvl==''||$position==''||$partylist==''||$image=='')
{
//generateerrormessage
$error='ERROR:Pleasefillinallrequiredfields!';
//error,displayform
//checkthatthe'id'matchesupwitharowinthe
databseif($row)
{
//getdatafromdb
$candidateID=$row['candidateID'];
$studnum=$row['studnum'];
$fname=$row['fname'];

$lname=$row['lname'];
$gender=$row['gender'];
$course=$row['course'];
$yearlvl=$row['yearlvl'];
$position=$row['position'];
$partylist=$row['partylist'];
$image=$row['image'];
//showform
renderForm($candidateID,$studnum,$fname,$lname,$gender,$course,$yearlvl,$position,
$partylist,$image,'');
}
else
//ifnomatch,displayresult
{

echo"Noresults!";
}
}
else
//ifthe'id'intheURLisn'tvalid,orifthereisno'id'value,displayanerror
{
echo'Error!';
}
}
?>
