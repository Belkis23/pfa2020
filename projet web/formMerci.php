<?php 
$nom = $_POST['nom'];
$checkbox = $_POST['checkbox'];
$gridRadios = $_POST['gridRadios'];


?>
<!DOCTYPE HTML>
<html> 
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="page2.html">
<style type="text/css">
	.card {
    display: inline-block;
    position: relative;
    width: 100%;
    margin: 25px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    border-radius: 3px;
    color: rgba(0, 0, 0, 0.87);
    background: #fff;
}
.card [data-background-color="purple"] {
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
    box-shadow: 0 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);
}
.card [data-background-color] {
    color: #FFFFFF;
}
.card .card-content {
    padding: 15px 20px;
}
@media (min-width: 992px)
.table-responsive {
    overflow: visible;
}
.table-responsive {
    min-height: .01%;
    overflow-x: auto;
}
body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4 {
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 300;
    line-height: 1.5em;
}
div {
    display: block;
}
th{
	width: 15px;     color: #9c27b0;
}
hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}

.card-header {
    box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    margin: -20px 15px 0;
    border-radius: 3px;
    padding: 5px;
    background-color: #999999;
}
</style>
</head>
<h1> Formulaire bien envoyer ! </h1> 
<p> Merci d'avoir pris le temps de remplir le formulaire !</p> 
<div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">all liste</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <div >

                            	<div class="row">
                            		<div class="col-sm-12">


                            <table style="width: 100%;">
                                <thead >
                                <tr role="row" style="    text-align: left;">
                                	<th   >Nom et prénom</th>

                                	<th  >Durant l'événement </th>


                                	<th  >workshop</th>
                                	
                                </tr>

                            </thead>

                                <tbody id='tbody'>
                                                                            
                                  <tr>
                                  	<td>
                                  		<?php echo $nom; ?>
                                  	 </td>
                                  	 <td>
                                  		<?php echo $checkbox; ?>
                                  	 </td>
                                  	 <td>
                                  		<?php echo $gridRadios; ?>
                                  	 </td>
                                  </tr>
                                    </tbody>
                            </table>

                        </div></div></div>
                        </div>
                    </div>
</body>
</html>