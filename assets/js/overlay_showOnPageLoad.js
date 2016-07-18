
/**
* Contao Open Source CMS
*
* Copyright (c) 2005-2016 Leo Feyer
*
* @package   EuF-Overlay
* @author    Sebastian Buck
* @license   LGPL
* @copyright Erdmann & Freunde
*/

$(document).ready(function() {
  /**
    * Funktionen für Cookies setzen, auslesen und löschen
    * Source: http://www.quirksmode.org/js/cookies.html#script
    */
  function createCookie(name, value, days) {
    var expires;

    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
    } else {
      expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
  }

  function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
  }
  /**
    * Ende Funktionen für Cookies
    */



  // Cookie initial abfragen
  if(!readCookie('euf_overlay_closed')) {

    // Overlay einblenden
    $("#euf_overlay").fadeIn();

    // Eventlistener für Close-Button setzen
    $(".euf_overlay__close").click(function() {
      closeOverlay();
    });

    $("#euf_overlay").click(function(event) {
       if(event.target === this) {
           closeOverlay();
       }
    });


    // Funktion zum schließen des Overlays
    function closeOverlay() {

      // Cookie-Lebenszeit auslesen
      var expires = $("#euf_overlay").data("expires");
      
      // Ausblenden
      $("#euf_overlay").toggle();
      // Cookiesetzen bei CLose
      createCookie('euf_overlay_closed', '1', expires);
    }
  }

});
