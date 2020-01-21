<?php
if(!empty ($_POST['Nom']) AND !empty ($_POST['event']) AND !empty ($_POST['workshop']))
{
echo "<table border =\"2\">";
foreach ($_POST as $cle =>$val){
	
	echo "<tr><td> $cle </td><td> $val</td></tr> ";
	
}
echo "</table>";}
?>