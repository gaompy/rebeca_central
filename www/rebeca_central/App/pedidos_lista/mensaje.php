<script> 
function toogle(a,b,c)
{
  
  document.getElementById(b).style.display=a;
  document.getElementById(c).style.display=a;
  setInterval(function () {parent.document.getElementById("form_busqueda").submit();}, 1500);
  
}

</script>
<style>
#modal
{
  position: absolute;
  padding: 0;
  margin: 0;
  width: 100%;
  height: 100%;
  z-index: 50;
  filter: alpha(opacity=50);
  opacity: 0.8;
  -moz-opacity:0.8;
  -webkit-opacity:0.8;
  -o-opacity:0.8;
  -ms-opacity:0.8;
  background-color: #808080;
  left: 0;
  top: 0;
  overflow: auto;
}

.contenedor
{
  width: 300px;
  background: #fff;
  position: relative;
  margin: 10% auto;
  padding: 30px;
  -moz-border-radius: 7px;
  border-radius: 7px;
  -webkit-box-shadow: 0 3px 20px rgba(0,0,0,0.9);
  -moz-box-shadow: 0 3px 20px rgba(0,0,0,0.9);
  box-shadow: 0 3px 20px rgba(0,0,0,0.9);
  background: -moz-linear-gradient(#fff, #ccc);
  background: -webkit-gradient(linear, right bottom, right top, color-stop(1, rgb(255,255,255)), color-stop(0.57,       rgb(230,230,230)));
  text-shadow: 0 1px 0 #fff;
}

.contenedor h2 {
  font-size: 20px;
  padding: 0 0 17px;
}

.contenedor a[href="#"] {
  position: absolute;
  right: 0;
  top: 0;
  color: transparent;
}

.contenedor a[href="#"]:focus {
  outline: none;
}

.contenedor a[href="#"]:after {
  content: 'X';
  display: block;
  position: absolute;
  right: -10px;
  top: -10px;
  width: 1.5em;
  padding: 1px 1px 1px 2px;
  text-decoration: none;
  text-shadow: none;
  text-align: center;
  font-weight: bold;
  background: #000;
  color: #fff;
  border: 3px solid #fff;
  -moz-border-radius: 20px;
  border-radius: 20px;
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
  -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
  box-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

.contenedor a[href="#"]:focus:after,
.contenedor a[href="#"]:hover:after {
  -webkit-transform: scale(1.1,1.1);
  -moz-transform: scale(1.1,1.1);
}
</style>

<body onLoad="toogle('block','modal','ventana')">
<div id="modal" style="display:none">
<div id="ventana" class="contenedor" style="display:none">
<h2>Aviso de Sistema</h2>
 "No se puede modificar/eliminar moneda, esta predeterminado por sistema"  
<a href="#" title="Cerrar" onclick="toogle('none','modal','ventana')" ></a>
</div>
</div>
