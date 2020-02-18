<!DOCTYPE html>
<?php
@session_start();
@$usuario=$_SESSION["id_usuario"];
if ($usuario<>"") {    
?>
		<script language="javascript">
		location.href="main.php";
		</script>

<?
}
include("conectar.php");
?>  

<html>
<link rel="shortcut icon" href="img/ico.png">
<link href="images/estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {font-family: "Times New Roman", Times, serif}
-->
</style>
		
		<script language="javascript">
		
		function inicio(){
		document.getElementById("username").focus();
		}
		
		</script>
    
    

<head >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Syspymes</title>
</head>


<body onLoad="inicio()">
<center>
<p><img src="images/logo.png" alt="" width="414" height="137">
</p>
<p>&nbsp;</p>
<p><strong>Login Usuario</strong>
  <center>
      
</p>
<form id="formulario" name="formulario" action='login.php' method='POST'>
<table style='border:1px solid #000000;'>
<tr>
<td align='right'>
  <span class="style2">Ingresar Usuario:</span>  
  <input  type='text' size='15' maxlength='25' name='username' id='username' value=""></td>
</tr>
<tr>
<td align='right'>
  <span class="style2">Ingresar Password:</span> 
   <input type='password' size='15' maxlength='25' name='password' id='password' value=""></td>
</tr>

 <?php
	 $query="SELECT * FROM mesas where borrado='0' and mes_cod > 0  ORDER BY mes_cod ASC";
	 $res=mysql_query($query);
	 $contador=0;
  ?>						
						
		<tr>				
			<td><span class="style2">Seleccione Punto : </span> <select id="caja" name="caja" class="comboGrande">

								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"mes_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"mes_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
			</select></td>
			</tr>
			      
      
      
<tr>
<td align='center'>
<input type="submit" value="Login">
<input type="reset" value="Borrar">
</td>
</tr>
<tr>
<td align='center'>
<center>
</center>
</td>
</tr>
</table>
</form>
</html>