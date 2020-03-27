
/**
 * @package   EuF-Overlay
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */

jQuery(document).ready(function($) {
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

  /**
   * add custom trigger function to fadein and toggle for euf_overlays (overwrite defaults)
   */
  var _oldFadeIn = $.fn.fadeIn;
  $.fn.fadeIn = function(){
    return _oldFadeIn.apply(this,arguments).trigger("fadeIn");
  };

  $('#euf_overlay').bind('fadeIn', function () {
    if(!$('html').hasClass('overlay_opened')) {
      $('html').addClass('overlay_opened');
      var scrollTop = $(document).scrollTop();
      $('html').css('position', 'fixed');
      $('html').css('width', '100%');
      $('html').css('top', '-'+scrollTop+'px');
      $('html').data("scrollTop", scrollTop);
    }
  });

  var _oldToggle = $.fn.toggle;
  $.fn.toggle = function(){
    return _oldToggle.apply(this,arguments).trigger("toggle");
  };

  $("#euf_overlay").bind("toggle",function(){
    if($('html').hasClass('overlay_opened')) {
      $('html').removeClass('overlay_opened');
      var scrollTop = $('html').data("scrollTop");
      $('html').css('position', '');
      $('html').css('width', '');
      $('html').css('top', '');
      $(document).scrollTop(scrollTop);
    }
  });

  // Cookie initial abfragen
  var intID = $("#euf_overlay").data("moduleid");
  if(!readCookie('euf_overlay_closed_'+intID)) {

    // Verzögerung auslesen
    var delay = $("#euf_overlay").data("delay");

    // Overlay einblenden
    setTimeout(function() {
      $("#euf_overlay").fadeIn();
    }, delay * 1000);

    // Eventlistener für Close-Button setzen
    $(".euf_overlay__close, .euf_overlay__accept").click(function() {
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
      var intID = $("#euf_overlay").data("moduleid");

      // Ausblenden
      $("#euf_overlay").fadeOut();
      $("#euf_overlay").toggle();
      // Cookiesetzen bei CLose
      createCookie('euf_overlay_closed_'+intID, '1', expires);
    }
  }

});
