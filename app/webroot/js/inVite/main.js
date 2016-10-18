var _FBvite;
var _vite_customer;
var _vite_site_id;
  
function getUserStats () {
  jQuery.ajaxSetup({
    cache: false,
    xhrFields:{
      withCredentials: false
    }
  });
  jQuery.ajax({
    type: "GET",
    url: "//in.vite.to/data/user/"+_vite_customer.email+"/campaign/"+_FBvite.campaign.id,
    dataType: "json",
    success: function (data, textStatus, jqXHR) {
      _vite_customer.stats = data.data;
      showStats();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(errorThrown);
    }
  });
}

function reportConvertion () {
    (function() {
		var vt = document.createElement('script'); 
		vt.type = 'text/javascript'; 
		vt.async = true;
		vt.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://in.vite.to/site/'+_vite_site_id;
		var s = document.getElementsByTagName('script')[0]; 
		s.parentNode.insertBefore(vt, s);
	})();
}

function convertionCallback (response) {
	var url = '';
	if(_vite_customer.juego_id != null){
		url='/falabella-denim/juegos/addChance';
		response['juego_id'] = _vite_customer.juego_id
	}else{
		url='/falabella-denim/juegos/saveWithInvite';
		if(_vite_customer.look_id != null){response['look_id'] = _vite_customer.look_id;}
	}
	
	response['user_id'] = _vite_customer.id;
	response['concurso_id'] = _vite_customer.concurso_id;
	
	_FBvite.convertion = response;
	jQuery.ajax({
	type: "POST",
	url: url,
	data: response,
	dataType: "json"
	});
}

function share (e) {
  e.preventDefault();
  var media = jQuery(e.target).attr("data-media"), s, uri = invitation_url;
  switch (media) {
    case "facebook":
    s = "https://www.facebook.com/sharer/sharer.php?u=";
    window.open(s + uri, 'sharer', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');
    break;
  case "twitter":
    s = "https://twitter.com/share?url=";
    window.open(s + uri + 'Ayudame a conseguir mi regalo para el Día del Niño', 'sharer', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');
    break;
  case "googleplus":
    s = "https://plus.google.com/share?url=";
    window.open(s + uri, 'sharer', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');
    break;
  default:
      window.open("mailto:?&body="+uri, "_blank");
  }
}

// Interface
function showUserInfo () {
  jQuery('#first_name').text(_vite_customer.first_name);
  jQuery('#email').text(_vite_customer.email);

  if (_FBvite.page.like) {
    jQuery('#require-like').hide();
  } else {
    jQuery('#liked').hide();
    jQuery('#main-content').block({ 
      centerY: false,
      message: $('div.fanPageBlock'),
      fadeIn: 500,
      css: {
        top: '0px',
        width: '100%',
        backgroundColor: 'none',
        border: 'none'
      },
      overlayCSS: { backgroundColor: '#EFF7F9' }
    });
  }

  jQuery('#main-content').show();
}

function showConversionInfo () {
  jQuery('#invitation_url').text(_FBvite.convertion.invitation_url);
  jQuery('#invitation_id').text(_FBvite.convertion.invitation_id);
  jQuery('#campaign_name').text(_FBvite.convertion.name);
  jQuery('#campaign_id').text(_FBvite.convertion.campaign_id);

  jQuery('#convertion-done').show(500);
}

function showStats () {
	console.log(_vite_customer.stats);
	jQuery('#chances').text(_vite_customer.stats.ref_conversions);/*
  jQuery('#clicks').text(_vite_customer.stats.clicks);
  jQuery('#ref_conversions').text(_vite_customer.stats.ref_conversions);
  jQuery('#user-stats').show(500);*/
}