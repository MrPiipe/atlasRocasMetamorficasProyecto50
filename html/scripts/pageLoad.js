function statusCredential(token) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://mydspaceis.dis.eafit.edu.co/rest/status",
        "method": "GET",
        "headers": {
            "rest-dspace-token": token,
            "accept": "application/json",
            "content-type": "application/json",
            "cache-control": "no-cache",
        }
    }

    $.ajax(settings).done(function(response) {
        if(response.token == undefined) {
            localStorage.clear();
            window.open("../index.html", "_self");
        }
    });
}
statusCredential(localStorage.cookie);
