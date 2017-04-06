<?php

$link = mysql_connect('localhost', 'root', '1234');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make atlasmetamorfico the current db
$db_selected = mysql_select_db('atlasmetamorfico', $link);
if (!$db_selected) {
    die('Can\'t use RsStocks : ' . mysql_error());
}

$result = mysql_query('SELECT * FROM atlas_mapa2');
    if (!$result) {
        die("Database query failed: " . mysql_error());
    }


    // 4. Use returned data
        $j = 0;
        while ($row = mysql_fetch_array($result)) {
            $nombre = $row["name"];
            $imagenuno = $row["imagenuno"];
            $imagendos = $row["imagendos"];
            $imagentres = $row["imagentres"];
            $macros = $row["macros"];
            $micros = $row["micros"];
            $porcentaje = $row["porcentaje"];
            $textura = $row["textura"];
            $intragranos = $row["intragranos"];
            $grado = $row["grado"];
            $latitud = $row["latitud"];
            $longitud = $row["longitud"];
            $zona = $row["zona"];
            $id = $row["id"];

            $array[$j] = array($nombre, $imagenuno, $imagendos, $imagentres, $macros, $micros, $porcentaje, $textura, $intragranos, $grado, $latitud, $longitud, $zona, $id);
            $arrlength = count($array);
            $j = $j + 1;
        }
?>

<div background="#22351C" class="thumbnail">
  <div id="map"></div>
  <script type="text/javascript">
var jArray= <?php echo json_encode($array); ?>;

var map = new GMaps({
        el: '#map',
        lat: 4.159769621076605,
        lng: -72.93013669999999,
        zoom: 5,
        zoomControl : true,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        streetViewControl: false,
        panControl: true,
      });

for (var x = 0; x < 2; x++) {
    var nombre = jArray[x][0];
    var imagenuno = jArray[x][1];
    var latitud = jArray[x][10];
    var longitud = jArray[x][11];
    var zona = jArray[x][12];

                if(zona == "1"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin rosa-02.png',
                    })
              };

              if(zona == "2"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin naranja-02.png',
                    })
              };

              if(zona == "3"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin amarillo-02.png',
                    })
              };

              if(zona == "4"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin verde-02.png',
                    })
              };

              if(zona == "5"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin morado-02.png',
                    })
              };

              if(zona == "6"){
                  map.addMarker({
                    lat: latitud,
                    lng: longitud,
                    title: nombre,
                    icon: '../../images/nuevo pin azul-02.png',
                    })
              };
};
  </script>
  <div layout="row" layout-align="space-around center">
    <div layout="column" layout-align="center start">
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe1=!ShowMe1; ShowMe2=false; ShowMe3=false; ShowMe4=false; ShowMe5=false; ShowMe6=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-rosa.png"> Área entre las fallas Otú - Pericos y Cauca - Almague</md-button>
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe2=!ShowMe2; ShowMe1=false; ShowMe3=false; ShowMe4=false; ShowMe5=false; ShowMe6=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-naranja.png"> Área entre las fallas Guaicáramo y Otú - Pericos</md-button>
    </div>
    <div layout="column" layout-align="center start">
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe3=!ShowMe3; ShowMe2=false; ShowMe1=false; ShowMe4=false; ShowMe5=false; ShowMe6=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-amarillo.png"> Área al oriente de la falla Guaicáramo</md-button>
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe4=!ShowMe4; ShowMe2=false; ShowMe3=false; ShowMe1=false; ShowMe5=false; ShowMe6=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-verde.png"> Área al occidente de la falla Cauca</md-button>
    </div>
    <div layout="column" layout-align="center start">
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe5=!ShowMe5; ShowMe2=false; ShowMe3=false; ShowMe4=false; ShowMe1=false; ShowMe6=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-verde.png"> Área entre las fallas Santa Marta y Oca</md-button>
      <md-button style="color:#fff; font-size:12px" ng-click="ShowMe6=!ShowMe6; ShowMe2=false; ShowMe3=false; ShowMe4=false; ShowMe5=false; ShowMe1=false" class="md-accent"><img style="width: 13px;" src="../images/iconos%20areas-azul.png"> Área al norte de la falla de Oca</md-button>
    </div>
  </div>
</div>
<br>
<div ui-view></div>
<br>

<div class="exclamacion"></div>
<p class="informacion">Click en cada área para ampliar la información.</p>

<!-- View de la Zona 1 -->
<div ng-show="ShowMe1">
  <!--<a class="xx" ng-click="ShowMe1=false"> Cerrar </a>-->
  <div class="Botonsito"><img src="../images/iconos%20areas-rosa.png"></div>
  <h4 class="muestraa">ÁREAS ENTRE LA FALLA OTÚ – PERICOS - ROMERAL– CAUCA (Cordillera Central)</h4>
  <div class="Cajonsito"><a href="" ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area01.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area01.png"><p> {{ Mensajedos }} </p></a>
  </div>
  <p class="Info_Areas">Estás áreas están determinadas por las facies metamórficas Barrowiana, Bucan – Abukuma y Franciscana y se encuentran las zonas definidas entre la falla Otú – Pericos y la falla Romeral, están distribuidas en varios eventos orogénicos, como son el evento Precámbrico (Orogenia Grenville), Acadiano y Hercínico (Permo-Triásico) ubicados al Oriente de la Falla Romeral y Cretácico (?) al Occidente de la Falla Romeral.  Estas unidades se encuentran a su vez afectadas por los eventos magmáticos del Cretácico (p.e. Batolito Antioqueño), que superponen en general un metamorfismo de contacto al metamorfismo regional anteriormente mencionado. (Maya, 2001). Adicionalmente, se observan evidencias cinemáticas asociadas a los eventos de metamofismo dinámicos dúctil relacionadas con la reactivación de los sitemas de fallas regionales, sobreimponiendo texturas miloníticas y en algunos casos de metamorfismo frágil con texturas cataclásticas. Las unidades geológicas más importantes son: Complejo el Retiro (Precámbrico), Complejo Cajamarca, Complejo Puquí, Neiss de las Palmas, Esquistos de Baldías, Neiss de Abejorral, Neiss de Norcasia, Neiss de Palmitas, Complejo Arquía. (Ingeominas, 2007).<br><br>REFERENCIAS:<br> Ingeominas. 2007. The Geological Map of Colombia – GMC. Instituto Colombiano de Geología y Mineria. Bogotá. Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37. </p>
  </div>
</div>

<!-- View de la zona 2 -->
<div ng-show="ShowMe2">
  <div class="Botonsito"><img src="../images/iconos%20areas-naranja.png"></div>
  <h4 class="muestraa">ÁREA ENTRE LAS FALLAS GUAICARAMO Y OTÚ – PERICOS</h4>
  <div class="Cajonsito"><a ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area02.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area02.png"><p>{{ Mensajedos }}</p></a>
  </div>
  <p class="Info_Areas">Estas áreas están delimitadas por las fallas Guaicaramo y Otú – Pericos, se encuentran los Macizos de Santander y la Floresta, Quetame y el borde Oriental de la Cordillera Central, determinados por las facies metamórficas típicas Bucan – Abukuma y Barrowiana y definidas entre el evento Nickeriense (Orogenia Grenville) y Paleozoico temprano a medio tardío conocidos como las Orogenias del Cámbrico – Ordovícico y Caledoniana. (Maya, 2001) Las unidades geológicas más importantes son: Complejo Davis, Complejo Icarco, Neiss de San Lucas, Anfibolita de Tierradentro, Neiss de Bucaramanga, Milonitas del Vapor, Formación Silgará, Complejo Quetame, Ortoneiss de Samaná, Complejo de Santander y la Floresta. (Ingeominas, 2007).<br> REFERENCIAS:<br> Ingeominas. 2007. The Geological Map of Colombia – GMC. Instituto Colombiano de Geología y Mineria. Bogotá. Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37.  </p>
  </div>
</div>

<!-- View de la zona 3 -->
<div ng-show="ShowMe3">
  <div class="Botonsito"><img src="../images/iconos%20areas-amarillo.png"></div>
  <h4 class="muestraa">ÁREA AL ORIENTE DE LA FALLA GUAICARAMO</h4>
  <div class="Cajonsito"><a ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area04.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area04.png"><p>{{ Mensajedos }}</p></a>
  </div>
  <p class="Info_Areas">Esta área incluye a la región de Guainía, el Macizo de Garzón, la Serranía de la Macarena y región suroriental del nudo de los Pastos; como su nombre las define éstas están delimitados por la falla Guaicaramo y tienen una variación de facies típicas de las series Bucan – Abukuma y Barrowiana, determinadas la mayoría en el evento metamórfico Nickeriense (también conocido como la Orogenia Grenville), a excepción de la región de Guainía, que también está afectada por eventos anteriores como el Transamazónico y el evento magmático Parguense. (Maya, 2001) Las unidades geológicas más importantes son: Complejo Migmatítico de Mitú, Granulitas del Macizo de Garzón y Serranía de la Macarena. (Ingeominas, 2007)<br>

  REFERENCIAS:<br>
  Ingeominas. 2007. The Geological Map of Colombia – GMC. Instituto Colombiano de Geología y Mineria. Bogotá.

  Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37. </p>
  </div>
</div>

<!-- View de la zona 4 -->
<div ng-show="ShowMe4">
  <div class="Botonsito"><img src="../images/iconos%20areas-verde.png"></div>
  <h4 class="muestraa">ÁREA AL OCCIDENTE DE LA FALLA CAUCA –ALMAGUER (ROMERAL)</h4>
  <div class="Cajonsito"><a ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area03.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area03.png"><p>{{ Mensajedos }}</p></a>
  </div>
  <p class="Info_Areas">Está área metamórfica se encuentra enmarcada entre las zonas del Suroccidente de la Cordillera Central y la Serrania del Baudó y está delimitada por la falla Cauca; se encuentran facies metamórficas típicas de las series Bucan – Abukuma, con eventos orogénicos no determinados del Cretácico, referentes a metamorfismo sobre rocas básicas y/o eventos dinámicos y/o hidrotermales. En esta zona afloran basaltos, lavas andesíticas con cantidades menores de doleritas, gabros, brechas volcánicas y delgados horizontes de vulcanoclastitas con metamorfismo en las facies ceolita, prehnita-pumpellyta y esquisto verde de baja presión, ocurrido entre el Cretáceo tardío y el Paleógeno. También afloran Pizarras, filitas, meta-areniscas, meta-calizas y meta-cherts (Maya, 2001).<br>

  REFERENCIAS:<br>
  Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37. </p>
  </div>
</div>

<!-- View de la zona 5 -->
<div ng-show="ShowMe5">
  <div class="Botonsito"><img src="../images/iconos%20areas-verde.png"></div>
  <h4 class="muestraa">ÁREA ENTRE LA FALLA DE OCA Y LA FALLA SANTA MARTA – BUCARAMANGA <br>(SIERRA NEVADA DE SANTA MARTA)</h4>
  <div class="Cajonsito"><a ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area05.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area05.png"><p>{{ Mensajedos }}</p></a>
  </div>
  <p class="Info_Areas">Delimitados entre la falla de Oca y la falla Santa Marta – Bucaramanga se encuentran las zonas definidas como el Cinturón de la Sierra Nevada, el Cinturón de Sevilla y el Cinturón de Santa Marta con facies metamórficas típicas de las series Franciscana – Sambagawa, Barrowiano, Bucan – Abukuma y en algunos casos aún no han sido determinados. Se encuentran rocas metamórficas en facie granulita asociadas al evento orogénco Grenvilliano (Cardona et al., 2012), eventos entre el Maastrichiano y el Paleoceno Inferior (Bustamante et al, 2009) y al evento metamórfico del Cretáceo tardío, llamado evento Concha, Concha II o Gaira (Paleoceno). Las unidades geológicas más importantes son: Gneis de Dibulla, Granulita de los Mangos, Esquistos de Gaira, Esquistos de San Lorenzo, Esquistos de Santa Marta y Formación Perijá. (Ingeominas, 2007 y Bustamante et al, 2009).<br>

  REFERENCIAS:<br>
  Bustamante, C., Cardona, A., Saldarriaga, M., García-Casco, A., Valencia, V. & Weber, M. 2009. Metamorfismo de los esquistos verdes y anfibolitas pertenecientes a los esquistos de Santa Marta, Sierra Nevada de Santa Marta (Colombia): ¿Registro de la colisión entre el arco Caribe y la margen Suraméricana?. Boletín de Ciencias de la Tierra. Medellín. Pp. 7 – 26. <br>

  Ingeominas. 2007. The Geological Map of Colombia – GMC. Instituto Colombiano de Geología y Mineria. Bogotá. <br>

  Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37. </p>
  </div>
</div>

<!-- View de la zona 6 -->
<div ng-show="ShowMe6">
  <div class="Botonsito"><img src="../images/iconos%20areas-azul.png"></div>
  <h4 class="muestraa">ÁREA AL NORTE DE LA FALLA DE OCA (PENÍNSULA DE LA GUAJIRA)</h4>
  <div class="Cajonsito"><a ng-click="popUpImg=true" ng-mouseover="Mensaje='Haga click para Ampliar'" ng-mouseleave="Mensaje=''"><img src="../images/Area06.png"><p>{{ Mensaje }}</p></a></div>
  <div class="popUp" ng-show="popUpImg">
    <a href="" ng-click="popUpImg=false" ng-mouseover="Mensajedos='Haga click para cerrar'" ng-mouseleave="Mensajedos=''"><img src="../images/Area06.png"><p>{{ Mensajedos }}</p></a>
  </div>
  <p class="Info_Areas">El sector al oriente de la falla Simarua y al occidente de la misma, componen esta área y se encuentran definidos al Norte de la falla Oca y al Oriente de la falla Simarua; presentan facies metamórficas típicas de las series Barrowiano y Bucan – Abukuma de posible edad Paleozoica o Precámbrico y Cretácico tardío para el sector al Oriente de la falla Simarua en donde afloran neises hornbléndicos, esquistos cuarzo-micáceos y anfibólicos, mármoles, silos metagraníticos y serpentinitas y edad Paleógena para el sector al Occidente de la falla Simarua, en donde afloran filitas, cuarcitas, esquistos cuarzo-micáceos y meta-areniscas con cantidades menores de meta-vulcanitas, mármoles, anfibolitas y serpentinitas (Maya, 2001).<br>
  REFERENCIAS:<br>
  Maya, M. 2001. Distribución, facies y edad de las rocas metamórficas en Colombia. INGEOMINAS. Colombia. Pp. 1 – 37.</p>
  </div>
</div>


<div>
  <div flex layout="row" layout-align="space-around center" layout-margin layout-fill layout-padding>
    <a class="botones" ng-click="mostrardef1=!mostrardef1; mostrardef2=false; mostrardef3=false"><img src="../images/botones%20-01.png"></a>
    <a class="botones" ng-click="mostrardef2=!mostrardef2; mostrardef1=false; mostrardef3=false"><img src="../images/botones%20rosado-01.png"></a>
    <a class="botones" ng-click="mostrardef3=!mostrardef3; mostrardef2=false; mostrardef1=false"><img src="../images/botones%20-02.png"></a>
  </div>

  <div ng-show="mostrardef1" >
      <h4 class="muestraa"> Que es el Atlas de Rocas Metamórficas? </h4>
      <p class="Info_Caja"> El Atlas de Rocas Metamórficas de la universidad EAFIT es una herramienta interactiva localizada en un sitio web que intenta aportar en el afianzamiento de los procesos de enseñanza y aprendizaje de las rocas metamórficas, el reconocimiento de los patrones texturales que son de vital importancia para el análisis del tipo de metamorfismo y los esfuerzos cinemáticos que han actuado sobre la unidad de roca; permitiendo tener una noción más amplia de las rocas pertenecientes a unidades metamórficas que afloran en Colombia.<br>

      La plataforma desarrollado incluye:<br>(1) mapa de localización de las muestras de rocas metamórficas que exiten la colección SigGeo del laboratorio de Geologia;<br>(2) Descripción detallada de cada muestra; <br>(3) Selección de mapas conceptuales que apoyan los procesos pedagógicos de la materia rocas metamórficas; <br>(4) Identificación y descripción de las zonas metamórficas existentes en Colombia <br>(5) glosario; y <br>(6) repositorio de imagenes de secciones delgadas ligadas al mapa de Colombia y su relación con las zonas metamórficas. </p>
  </div>

   <div ng-show="mostrardef2" >
      <h4 class="muestraa"> Distribucion Metamorfismo en Colombia </h4>
      <p class="Info_Caac
      ja"> Se realizado una exhaustiva revisión de las diferentes secciones delgadas pertenecientes al atlas de rocas metamórficas de la Universidad EAFIT y de éstas se han seleccionado las más representativas de los diferentes tipos de metamorfismo presentes en Colombia, las cuales a su vez, se encuentran debidamente georeferenciadas y descritas; representando claros ejemplos de las zonas geográficas donde afloran rocas metamórficas en Colombia, y se encuentran caracterizadas y delimitadas por Maya (2001). Para cada una de estas zonas se presenta una descripción asociada al tipo de metamorfismo dominante, y una selección de muestras que contienen análisis petrográfico, análisis de imágenes digitales y su debida localización en el mapa de distribución de facies metamórficas.<br>
      Actualmente, la distribución de las rocas metamórficas, ha permitido que estas se clasifiquen en diferentes unidades metamórficas, en donde las condiciones de presión y temperatura, y además el tiempo de ocurrencia de los diversos eventos metamórficos que han sido impuestos en los cuerpos rocosos, son características claves para la definición y descripción de estos.<br>
      Esta distribución de las rocas metamórficas en Colombia en términos de Maya (2001), se describe con base en la separación de seis áreas geográficas limitadas por grandes fallas: <br>1) al oriente de la Falla Guaicáramo, <br>2) entre las fallas Guaicáramo y Otú-Pericos, <br>3) entre la Falla Otú-Pericos y la Falla Cauca-Almaguer (Romeral), <br>4) al occidente de la Falla Romeral, <br>5) entre las fallas Oca y Santa Marta - Bucaramanga y <br>6) al norte de la Falla de Oca.</p>
  </div>

   <div ng-show="mostrardef3" >
      <h4 class="muestraa"> Definicion del Metamorfismo </h4>
      <p class="Info_Caja"> Es un proceso geológico que produce cambios en la mineralogía y/o la textura de una roca en estado sólido. El proceso se debe sobre todo, a la influencia de los <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-2DV65B-BN/Agentes_Metamorfismo.cmap" target="_blank">agentes metamórficos</a> que generan el reajuste de la roca a condiciones físicas diferentes a las dominantes cuando la roca se formó, y que también, son diferentes a las condiciones físicas imperantes en la superficie de la tierra y durante la diagénesis. El proceso puede coexistir con fusión parcial y puede también implicar cambios en la composición química global de la roca (Yardley, 1989).<br>
      El metamorfismo puede ser clasificado en diferentes <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-257016F-BL/Tipos_Metamorfismo.cmap" target="_blank">tipos de metamorfismo</a> dependiendo de los criterios que sean utilizados, y teniendo en cuenta el principal factor que ha conllevado a que se produzca metamorfismo. En nuestro caso, partimos de tres tipos de metamorfismo principales, <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-1YM3MJ3-BH/Metamorfismo_Regional.cmap" target="_blank">metamorfismo regional</a>, <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-1VSZ3F8-BM/Metamorfismo_Contacto.cmap" target="_blank">metamorfismo de contacto</a> y <a href=""></a>; los cuales pueden abarcar diferentes sub-tipos de metamorfismo asociados entre sí.<br>
      El metamorfismo puede ser clasificado en diferentes <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-257016F-BL/Tipos_Metamorfismo.cmap" target="_blank">tipos de metamorfismo</a> dependiendo de los criterios que sean utilizados, y teniendo en cuenta el principal factor que ha conllevado a que se produzca metamorfismo. En nuestro caso, partimos de tres tipos de metamorfismo principales, <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-1YM3MJ3-BH/Metamorfismo_Regional.cmap" target="_blank">metamorfismo regional</a>, <a href="http://mapas.eafit.edu.co/rid=1NBZ5F4Z1-1VSZ3F8-BM/Metamorfismo_Contacto.cmap" target="_blank">metamorfismo de contacto</a> y <a href="http://mapas.eafit.edu.co/rid=1NCGT3HG7-19FT6RN-B7S/Metamorfismo%20Din%C3%A1mico.cmap" target="_blank">metamorfismo dinamico</a>; los cuales pueden abarcar diferentes sub-tipos de metamorfismo asociados entre sí.<br>
      El metamorfismo regional da lugar a grandes extensiones de rocas metamórficas asociadas a cadenas montañosas, se encuentra asociado exclusivamente a zonas de subducción y afecta los cuerpos rocosos regionalmente. Es el resultado del efecto simultáneo de presión y temperatura. Las regiones que son afectadas por este tipo de metamorfismo, pueden presentar zonas donde el proceso ha sido más o menos intenso, dependiendo de la profundidad en la que se desarrolló el evento. En las zonas poco profundas, el metamorfismo suele ser poco intenso, por el contrario, en las zonas más profundas, las rocas suelen encontrarse intensamente metamorfizadas. Las variaciones en el grado de metamorfismo están caracterizada por series de rocas metamórficas: <a href="http://mapas.eafit.edu.co/rid=1NDDTPR87-1J4NKMP-79D/Serie%20Buchan.cmap" target="_blank">La serie Buchan</a> y <a href="http://mapas.eafit.edu.co/rid=1P71JR2T3-WYQZ9H-HSS/Serie%20Barrowiana.cmap" target="_blank">la serie Barrowiana</a> están restringidas a condiciones de temperatura y presión bajas a medias, mientras que <a href="http://mapas.eafit.edu.co/rid=1P71FMZ7L-11ZLWWM-GKQ/Serie%20Franciscana.cmap" target="_blank">la serie Franciscana</a> y <a href="http://mapas.eafit.edu.co/rid=1P71DTMWF-138FRTC-DKH/Serie%20Sambagawa.cmap" target="_blank">la serie Sambagawa</a> están dominadas por condiciones de presión y temperaturas muy altas, dando lugar a un tipo de metamorfismo específico de estas dos series; denominado Metamorfismo High P-T (Por su nombre en español, metamorfismo de alta presión y temperatura).<br>
      Por otra parte, el metamorfismo de contacto se produce a raíz del aumento local de la temperatura de una roca encajante, como consecuencia de una intrusión ígnea, este proceso da paso a un fenómeno que se conoce como aureola de contacto, gracias al emplazamiento de un fundido ígneo. Generalmente las rocas que se encuentran dentro de la aureola de contacto, no presentan deformaciones, los minerales metamórficos no evidencian ninguna orientación preferencial, dando lugar a rocas masivas y muy duras que reciben el nombre genérico de corneanas.<br>
      Dentro del metamorfismo de contacto, también se presentan fenómenos como el <a href="http://mapas.eafit.edu.co/rid=1P7140VBX-77BK32-3ZZ/Metamorfismo%20por%20combusti%C3%B3n%20y%20descarga%20de%20rayos%20(contacto).cmap" target="_blank">metamorfismo por descarga de rayos</a>, es un tipo de metamorfismo de extensión local, el cual se da por contacto de una descarga eléctrica en la roca, modificando su composición mineralógica. La roca resultante es comúnmente una fulgurita, sin embargo también pueden resultar rocas netamente vítreas.<br>
      <a href="http://mapas.eafit.edu.co/rid=1P713TVXP-27WYZX5-3MF/Pirometamorfismo%20(contacto).cmap" target="_blank">El pirometamorfismo</a> es otro tipo de metamorfismo de contacto caracterizado por muy altas temperaturas y bajas presiones, que son generadas por un cuerpo volcánico; el pirometamorfismo puede venir acompañado por varios grados de fusión parcial. <a href="http://mapas.eafit.edu.co/rid=1P714LJR7-T0VPXP-50Q/Metamorfismo%20Hot-Slab%20(contacto).cmap" target="_blank">El metamorfismo hot-slab</a> es otro tipo de metamorfismo de contacto de extensión local,  ocurre bajo el emplazamiento de un cuerpo tectónico caliente en donde el gradiente térmico se encuentra invertido y se caracteriza por ser muy abrupto.  <a href="http://mapas.eafit.edu.co/rid=1P7140VBX-77BK32-3ZZ/Metamorfismo%20por%20combusti%C3%B3n%20y%20descarga%20de%20rayos%20(contacto).cmap" target="_blank">El metamorfismo por combustión</a> es un tipo de metamorfismo de extensión local producido por combustión espontánea de sustancias de origen natural como rocas bituminosas, carbón y petróleo.<br><br>

      Finalmente el metamorfismo dinámico es el resultado de la deformación intensa de los cuerpos rocosos, este proceso metamorfico, tiene lugar en las zonas de falla, los bloques se fracturan y se trituran debido a la fricción que se genera entre ellos, dicha fricción también genera condiciones de calor que en conjunto dan resultado a cataclasitas o brechas de falla.<br><br>

      Referencias:  <br>
      Fettes, D & Desmons, J., 2007.  Metamorphic rocks a classification and glossary of terms: Recommendations of the International Union of Geological Sciences Subcommision on the Systematics of Metamorphic Rocks. Cambridge University Press.<br>
      Gómez, J., 2006. Metamorfismo: Apuntes de la asignatura petrología endógena II (Módulo I). Taller curso de la Licenciatura de Geología,. Departamento de ciencias de la Tierra., Universidad de Zaragoza.<br>
      Duque-Escobar, G,. 2003. Manual de geología para ingenieros. Biblioteca digital, Universidad Nacional de Colombia. </p>
  </div>
</div>
