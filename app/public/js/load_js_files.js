/**
 * Created by Taban on 5/30/16.
 */

function loadScript(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
        var fileref=document.createElement('script');
        fileref.setAttribute("type","text/javascript");
        fileref.setAttribute("src", filename)
    }
    else if (filetype=="css"){ //if filename is an external CSS file
        var fileref=document.createElement("link");
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
    }
    if (typeof fileref!="undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}

loadScript("public/angular-js/bower_components/angular/angular.min.js", "js");
loadScript("public/bower_components/angular-ui-router/release/angular-ui-router.min.js", "js");
loadScript("public/angular-js/angular-file-upload.js", "js");
loadScript("public/js/app.js", "js");
loadScript("public/js/controllers/crudUserController.js", "js");
loadScript("public/js/services/authentication.js", "js");
loadScript("public/js/services/sessionServices.js", "js");

