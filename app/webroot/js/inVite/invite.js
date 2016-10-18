/*!
* @mundoyerba
* Copyright 2013 Vite.to
* http://vite.to/
*/
var _vite = {
  lp: ('https:' == document.location.protocol) ? 'https:' : 'http:',
  jq: '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
  va: '//in.vite.to/site/',
  mp: '//in.vite.to/assets/jquery.blockUI.min.js',
  cb: '//in.vite.to/assets/close-button.png',
  co: '//in.vite.to/assets/conversion.ie.1.0.0.htm',
  ts: new Date().getTime(),
  initialize: function () {
    // Prevent
    if (!window.console){
      window.console = {log: function(){}};
    }
    jQuery.ajaxSetup({
      cache: false,
      xhrFields:{
        withCredentials: true
      }
    });
    this.reportConversion();
    $.noConflict();
  },
  reportConversion: function () {
    var d = {};
    if (typeof _vite_customer != "undefined") d.customer = _vite_customer;
    if (typeof _vite_order_details != "undefined") d.order = _vite_order_details;
    if (typeof _vite_custom_field != "undefined") d.custom = _vite_custom_field;

    var u = this.lp+this.va+_vite_site_id+'/conversion';

    if(!jQuery.support.cors && typeof window.postMessage != "undefined") {
      // IFRAME hack
      if (window.addEventListener) window.addEventListener('message', this.receiveMessage, false);
      else if (window.attachEvent) window.attachEvent('onmessage', this.receiveMessage);

      d.site_id = _vite_site_id;
      d.referer = document.location.href;
      jQuery('<iframe />', {
        name: 'vite-'+this.ts,
        id: 'vite-'+this.ts,
        src: this.lp+this.co
      }).appendTo('body').load(function() {
        document.getElementById('vite-'+_vite.ts).contentWindow.postMessage(JSON.stringify(d), _vite.lp+_vite.co);
      });
    } else {
      jQuery.ajax({
        crossDomain: true,
        type: "POST",
        url: u,
        data: d,
        dataType: "json",
        success: function (data, textStatus, jqXHR) {
          console.log(data);
          _vite.parseResponse(data);
        },
        error: this.ajaxError
      });
    }
  },
  receiveMessage: function (e) {
    if (e.origin.indexOf("//in.vite.to") == -1) return;
    _vite.parseResponse(JSON.parse(e.data));
  },
  parseResponse: function (data) {
    if (data) {
      if (typeof data.modal != "undefined") {
        this.modal = data.modal;
        this.loadModal();
      }
      if (typeof _vite_callback != "undefined") _vite_callback(data);
    }
  },
  loadModal: function () {
    jQuery.getScript(this.lp+this.mp, function(data, textStatus, jqxhr) {
      _vite.showModal();
    });
  },
  showModal: function () {
    var b = jQuery('<img />', {
      src: this.lp+this.cb,
      border: '0px',
      style: 'position: absolute; cursor:pointer; top:-20px; left:'+(parseInt(this.modal.width)-25)+'px;'
    }).click(jQuery.unblockUI);
    var i = jQuery('<iframe />', {
      src: this.modal.src,
      frameborder: 0,
      marginheight: 0,
      marginwidth: 0,
      scrolling: 'no',
      width: this.modal.width+'px',
      height: this.modal.height+'px'
    });
    var w = jQuery(window);
    jQuery.blockUI({
      message: jQuery('<div />', {
          style: 'background: rgba(0, 0, 0, 0) none; border: none 0px; display: block; margin: 0px; padding: 0px; visibility: visible;'
      }).append(b).append(i),
      css: {
        left: '50%',
        top: '50%',
        'margin-left': (-this.modal.width/2)+'px',
        'margin-top': (-this.modal.height/2)+'px',
        height: this.modal.height+'px',
        width: this.modal.width+'px',
        border: '2px dashed #444',
        '-moz-border-radius': '8px',
        'border-radius': '8px',
        'background-color': '#f0f0f0',
        padding: '0px',
        '-webkit-box-shadow': '10px 10px 20px #333333',
        '-moz-box-shadow': '10px 10px 20px'
      }
    });
    jQuery('.blockOverlay').click(jQuery.unblockUI);
  },
  ajaxError: function (jqXHR, textStatus, errorThrown) {
    console.log(errorThrown);
  }
};

if (typeof _vite_site_id != "undefined") {
  if (typeof jQuery == "undefined") {
    function getScript(url, success) {
      var script = document.createElement('script');
      script.src = url;
      var head = document.getElementsByTagName('head')[0], done = false;
      script.onload = script.onreadystatechange = function() {
        if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
          done = true;
          success();
          script.onload = script.onreadystatechange = null;
          head.removeChild(script);
        };
      };
      head.appendChild(script);
    };
    getScript(_vite.lp+_vite.jq, function() {
      if (typeof jQuery == "undefined") {
        // Error?
      } else jQuery(_vite.initialize());
    });
  } else { // jQuery was already loaded
    jQuery(_vite.initialize());
  };
}