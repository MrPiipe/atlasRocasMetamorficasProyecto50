<!DOCTYPE html>
<link rel="stylesheet" href="../scripts/awesomplete-gh-pages/awesomplete.css" />
<script src="../scripts/awesomplete-gh-pages/awesomplete.js" async></script>
<link rel="stylesheet" href="../styles/newmuestras_style.css">
<link rel="stylesheet" href="../styles/foundation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/pageLoad.js"></script>
<html>
<body>
	<div id="muestras">
	<a href="../index.html#/atlas"><img id="cabeza" src="../images/newimgs/ROCAS1_02.png"></a>
	<img id="cabeza" src="../images/newimgs/ROCAS1_04.png">
	<div id="searchBar" >
		<form action="javascript:searchRedis();" method="post" enctype="text/plain">
			<button id="buttonSearch" type="submit" src="../images/newimgs/RC1.jpg"></button>
          	<input placeholder="Buscar" class="awesomplete" name="textquery" id="query" size="30%" type="text">
		</form>
	</div>
	<div id="busqueda"></div>
	<div id="nav"></div>
</div>
</body>
<script src="../scripts/newmuestras.js"></script>
<footer id="footer" layout="row">
    <img class="logo1" src="../images/logo3.png" />
    <img class="logo2" src="../images/logo4.png" />
    <a id="creditos2" ui-sref="creditos"><strong>Creditos</strong></a>
</footer>
</html>
