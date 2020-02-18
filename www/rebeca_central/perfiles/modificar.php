<?php include ("../conectar.php"); 

$variable1=$_GET["variable1"];

$query="SELECT * FROM niveles WHERE niv_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"niv_des"));
?>
<html>
	<head>
	<title>Principal</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="../funciones/validar.js"></script>
	<script language="javascript">
		
		function cancelar() {
			location.href="index.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function limpiar() {
			document.getElementById("formulario").reset();
		}
    
    function guardar(){
    
        if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
        }      
    
    }
  function inicio(){
		document.getElementById("variable2").focus();
}		
		
    </script>

	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR Nivel </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
												<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><strong><?php echo $variable1 ?></strong></td>
					    </tr>
						<tr>
							<td width="15%"><strong>Descripcion</strong></td>
						    <td width="85%" colspan="2"><strong><?php echo $variable2 ?></td>

					    </tr>
						<tr>	
						<?php
							
							$query_mod="select * from menu_cab where borrado=0 order by mec_ord";
							$rs_mod=mysql_query($query_mod);
							
							while ($row_mod = mysql_fetch_row($rs_mod)) {
							
							@$modulo=$row_mod[0];@$modulo_des=$row_mod[1];
						?>		
						<td width="15%"><strong><?php echo @$modulo_des; ?></strong></td>
						
					    </tr>
						<tr>	

						<?php
						
						$query="SELECT per_cod,niv_cod,mec_cod, med_cod,(SELECT med_des FROM menu_det WHERE med_cod=permisos.med_cod)AS per_des,
per_agr,per_mod,per_imp,per_con,per_eli from 
permisos where niv_cod='$variable1' and mec_cod='$modulo' order by (SELECT med_ord FROM menu_det WHERE med_cod=permisos.med_cod)";
						
            
            $rs=mysql_query($query);
							while ($row = mysql_fetch_row($rs)) {
							$var0=$row[0];$var3=$row[3];$var4=$row[4];$var5=$row[5];$var6=$row[6];$var7=$row[7];$var8=$row[8];$var9=$row[9];
											
							$variA="variA";
							$variB="variB";
							$variC="variC";
							$variD="variD";
							$variE="variE";
							
							$variableA="$variA$var0";
							$variableB="$variB$var0";
							$variableC="$variC$var0";
							$variableD="$variD$var0";
							$variableE="$variE$var0";
							
							
							
						   
					if ($var5=='on'){
							$va5="values='' checked";
		
							}else {
							
							$va5="";
							}
						
					if ($var6=='on'){
							$va6="values='' checked";
		
							}else {
							
							$va6="";
							}
					if ($var7=='on'){
							$va7="values='' checked";
		
							}else {
							
							$va7="";
							}
					
					if ($var8=='on'){
							$va8="values='' checked";
		
							}else {
							
							$va8="";
							}
					
					if ($var9=='on'){
							$va9="values='' checked";
		
							}else {
							
							$va9="";
							}
						
						
						
						
						
						?>


							<td width="15%"><?php echo $var4; ?></td>
						    <td width="2%">&nbsp; </td>
                <td width="2%">&nbsp; </td>
                <td width="2%">&nbsp; </td>
						  
							
							<td width="2%">Imprimir<input NAME="<?php echo $variableC;?>" type="checkbox"  id="<?php echo $variableC;?>"<?php echo $va7;?> </td>
							<td width="2%">Eliminar<input NAME="<?php echo $variableE;?>" type="checkbox"  id="<?php echo $variableE;?>"<?php echo $va9;?> </td>
              <td width="2%">Modificar<input NAME="<?php echo $variableB;?>" type="checkbox"  id="<?php echo $variableB;?>" <?php echo $va6;?> </td>
              <td width="2%">Agregar<input NAME="<?php echo $variableA;?>" type="checkbox"  id="<?php echo $variableA;?>"<?php echo $va5;?> </td>
              <td width="2%">Consulta<input NAME="<?php echo $variableD;?>" type="checkbox"  id="<?php echo $variableD;?>" <?php echo $va8;?> </td>
							
					
						 	
						
					
						<tr>
					<?php
					} }
					?>
					
					
					
					
					
					
					</table>
			  </div>
				<div id="botonBusqueda"><img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="<?php echo $variable1;?>" type="hidden">
			  </div>
			    </form>
			  </div>
		  </div>
		</div>
    </body>
</html>
