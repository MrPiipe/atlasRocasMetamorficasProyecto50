<!DOCTYPE html>
<head>
  <div id="loadingMask" style="width: 100%; height: 1500px; position: absolute; background: #fff;"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="../scripts/pageLoad.js"></script>
</head>
<script src="../styles/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="../styles/jquery.bxslider.css">
<link rel="stylesheet" href="../styles/cover.css">
<link rel="stylesheet" href="../styles/foundation.css">

<?php
include '../scripts/metadata_getter_controller.php';
include '../scripts/bits_getter_controller.php';
$idMeta   = $_GET['id'];
$imgArray = getBitstreamIdOrig($idMeta);
?>

<html>
<body>
<div flex class="row">
  <div class="large-12 columns">
    <a href="../index.html#/atlas"><img id="cabeza3" src="../images/newimgs/ROCAS1_02.png"></a>
    <img id="cabeza3" src="../images/newimgs/ROCAS1_04.png">
    <div flex layout="column">
      <h2 id="name"> <?php echo getName($idMeta); ?></h2>
    </div>

    <ul class="imagenes">
      <?php
      foreach ($imgArray as $img) {
          echo '<li>' . getBitstreamImg($img) . '</li>';
      }
      ?>
    </ul>
    <div id="locacion"><?php echo getLocation($idMeta); ?></div>
    <div id="codigo"><?php echo getId($idMeta); ?></div>
    <div id="altitud"><?php echo getHeight($idMeta); ?></div>
    <img style="height:400px;" src="../images/newimgs/ATLASrocasai-04.jpg">
    <br><br>
    <div id="nombrecompleto">
     <img class="large-8 columns" id="nombrer" src="../images/newimgs/ATLASrocasai-06.jpg">
      <h2 class="large-4 columns" style="width:55%;font-size:30px;" id="nombrerecolector" ><?php echo getAuthor($idMeta); ?></h2>
    </div>
    <br><br>
    <div style="margin-top:2%;">
      <img class="large-8 columns" id="arec" src="../images/newimgs/ATLASrocasai-07.jpg">
      <h2 class="large-4 columns" style="width:55%;font-size:30px;" id="arecoleccion" > <?php echo getItemDate($idMeta); ?></h2>
    </div>

    <div class="row" id="ah">
      <div class="large-6 columns"  id="puntosder" >
        <h3 class="intra" style="color:black; font-weight: lighter; text-align: center">DESCRIPCIÓN MACROSCÓPICA</h3>
        <p id="macros"><?php echo getMacroDescription($idMeta); ?></p>
      </div>
      <div class="large-6 columns" id="puntosizq">
        <h3 class="intra" style="color:black; font-weight: lighter; text-align: center">DESCRIPCIÓN MICROSCÓPICA</h3>
        <p id="micros"><?php echo getMicroDescription($idMeta); ?></p>
      </div>
    </div>

    <div id="margin">
      <img src="../images/cuadros.png">
      <div id="tipogrado"><?php echo getMetamorphism($idMeta); ?></div>
      <div id="afloramiento"><?php echo getAfloramiento($idMeta); ?></div>
      <div id="textura"><?php echo getTextures($idMeta); ?></div>
    </div>

    <div class="row" id="am">
      <div class="large-6 columns" >
        <h3 class="intra" style="color:white; font-weight: lighter; text-align: center">DESCRIPCION MINERALOGICA</h3>
        <p id="porcentaje"><?php echo getMineralDescription($idMeta); ?></p>
      </div>
      <div class="large-6 columns">
        <h3 class="intra" style="color:white; font-weight: lighter; text-align: center">DESCRIPCIÓN DE TEXTURA INTRAGRANOS</h3>
        <p id="intragranos"><?php echo getIntraTexturesDescription($idMeta); ?></p>
      </div>
    </div>

  <br></br>
</div>
</div>
<div class="small-1 columns"></div>
  <a href="newmuestras_pag.php">
  <img id="volver" src="../images/newimgs/ATLASrocasai-08.jpg"></a>
<br><br>
</body>
<footer id="footer" layout="row">
    <img class="logo1" src="../images/logo3.png" />
    <img class="logo2" src="../images/logo4.png" />
    <a id="creditos2" ui-sref="creditos"><strong>Creditos</strong></a>
</footer>
<script>
$('.imagenes').bxSlider();
</script>
</html>
