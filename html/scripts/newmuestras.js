//Get all pages, loop through them and hide them, then show the requested page
function show(elementID, pageNum, search) {
    var pages = document.getElementsByClassName('page');
    for(var i = 0; i < pages.length; i++) {
        pages[i].style.display = 'none';
    }
    if(!search) {
        getData(pageNum);
    }
    elementID.style.display = '';
}
//Realiza la busqueda en Redis con el query que tenga el input de "query". Retorna los 9 mejores elementos de la busqueda
function searchRedis() {
    var query = document.getElementById("query").value;
    $.ajax({
            type: 'post',
            url: '../scripts/search.php',
            data: {
                query: query
            }
        })
        .done(function(data) {
            $('#pag0').children("table").remove();
            var muestrasSearch = JSON.parse(data);
            displayData(muestrasSearch, 0);
        });
    show(pag0, 0, true);
}

function autoComplete() {
    var queryAutoComplete = document.getElementById("query").value;
    var awesomplete = new Awesomplete(queryAutoComplete);
    $.ajax({
        type: 'get',
        url: '../scripts/invertedIndex.php',
        success: function(data) {
            awesomplete.list = JSON.parse(data);
        }
    });
    console.log(awesomplete);

}
//Utiliza Ajax para popular la vista de muestra, utiliza el script de moreitems.php para coger los metadatos de Redis
function getData(pageNum) {
    displayPages(pageNum);
    $.ajax({
        type: 'post',
        url: '../scripts/moreitems.php',
        data: {
            pageNum: pageNum
        },
        success: function(data) {
            var muestras = JSON.parse(data);
            displayData(muestras, pageNum);
        }
    });
}
//Despliega los datos a partir de un JSON que recibe.
function displayData(data, pageNum) {
    $('#pag' + pageNum).children("tr").remove();
    $('#pag' + pageNum).children("td").remove();
    for(var $i = 0; $i < 9 && data['name'][$i] != undefined; $i++) {
        if($i == 3 || $i == 6) {
            $('#pag' + pageNum).append('<tr>');
        }
        html = '<td class="cellpadding">';
        html += '<a href="newsample.php?id=' + data['ids'][$i] + '" class="elemento">';
        html += data['img'][$i];
        html += '<div id="thumbnail"></div>';
        html += '<div class="boxelemento">';
        html += '<div id="nameThumb">' + data['name'][$i] + '</div>';
        html += '<div id="dateThumb">' + data['date'][$i] + '</div>';
        html += '</div>';
        html += '<img style="width:269.99px;" src="../images/newimgs/RC2.jpg"></img>';
        html += '</a></td>';
        $('#pag' + pageNum).append(html);
        if($i == 3 || $i == 6) {
            $('#pag' + pageNum).append('</tr>');
        }
    }
}
var display = '';
//Crea la numeracion de las paginas a partir de la cantidad de items que existan en el repositorio de DSpace
function displayPages(pageNum) {
    $.ajax({
            url: '../scripts/collections_getter_controller.php',
            data: {
                action: 'ids',
                id: '6'
            },
            type: 'post'
        })
        .done(function(data) {
            var maxItems = Math.floor(data / 9);
            if(pageNum == 1) {
                pageNum -= 1;
            } else if(pageNum >= 2) {
                pageNum -= 2;
            }
            $('#nav').children("a").remove();
            htmlNav = '<a class="pageNav" style="width: 10%" onclick="show(pag0,0,false);">Primero</a>';
            $('#nav').append(htmlNav);
            for(var j = 0; j < 5 && pageNum <= maxItems; j++, pageNum++) {
                page = (pageNum + 1);
                if(pageNum == 0) {
                    page = 1;
                }
                pagID = 'pag' + pageNum;
                htmlNav = '<a class="pageNav" onclick="show(' + pagID + ',' + pageNum + ',false);">' + page + '</a>';
                $('#nav').append(htmlNav);
            }

            pagID = 'pag' + maxItems;
            htmlNav = '<a class="pageNav" style="width: 10%" onclick="show(' + pagID + ',' + maxItems + ',false);">Ultimo</a>';
            $('#nav').append(htmlNav);
        });
}

function createPages() {
    $.ajax({
            url: '../scripts/collections_getter_controller.php',
            data: {
                action: 'ids',
                id: '6'
            },
            type: 'post'
        })
        .done(function(data) {
            var maxItems = Math.floor(data / 9);
            var i = 0;
            for(; i <= maxItems; i++) {
                html = '<table style ="display:' + display + '" id="pag' + i + '" class="page"></table>';
                $("#busqueda").append(html);
                display = 'none';
            }
            html = '<table style ="display:' + display + '" id="pag' + i + '" class="page"></table>';
            $("#busqueda").append(html);
        });
}
createPages();
$(document).ready(function() {
    getData(0);
    var queryAutoComplete = document.getElementById("query");
    var awesomplete = new Awesomplete(queryAutoComplete);
    $.ajax({
        type: 'post',
        url: '../scripts/invertedIndex.php',
        data: { action: 'list' },
        success: function(data) {
            awesomplete.list = JSON.parse(data);
        }
    });
})
