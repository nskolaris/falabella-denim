<div id="fb-root"></div>
<script>
	var userData;

	FB.init({
		appId      : '573736966005478',
		channelUrl : '//falabelladenimsound.com/channel.html',
		status     : true,
		cookie     : true,
		xfbml      : true 
	});
	
	function fbLogin(redirect){
		FB.getLoginStatus(function(response) { // Check de estado de permisos
			if (response.status === 'connected') { //Si tengo permisos seteo la variable de los datos del usuario
				if (redirect!=null){location.href = redirect;}
				FB.api('/me', function(response) {
					userData = response;
				});
			} else if (response.status === 'not_authorized') {
				FB.login(function(response) {
					if (redirect!=null){location.href = redirect;}
					if (response.authResponse){FB.api('/me', function(response) {userData = response;});}
				},{scope: 'email,user_birthday'});
			} else {
				FB.login(function(response) {
					if (redirect!=null){location.href = redirect;}
					if (response.authResponse){FB.api('/me', function(response) {userData = response;});}
				},{scope: 'email,user_birthday'});
			}
		});
	}
</script>