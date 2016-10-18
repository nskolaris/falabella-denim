<script>
	var uid;
	var accessToken;
	
	/*FB.Event.subscribe('auth.authResponseChange', function(response) {
		if (response.status === 'connected') {
			FB.api('/me', function(response) {
				console.log('si');
				fb_user = response;
			});
		} else if (response.status === 'not_authorized') {
			console.log('maso');
			FB.login();
		} else {
			console.log('no');
			FB.login();
		}
	});*/
	
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			uid = response.authResponse.userID;
			accessToken = response.authResponse.accessToken;
		} else if (response.status === 'not_authorized') {
			$('.black-overlay').show();
			FB.login();
		} else {
			$('.black-overlay').show();
			FB.login();
		}
	});
</script>