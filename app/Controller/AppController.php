<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
	public $uses = array('Usuario');

	function beforeFilter(){
		parent::beforeFilter();
		$this->header('P3P: CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
		@session_start();
		if (isset($_REQUEST['signed_request'])) {
			$_SESSION['signed_request'] = $_REQUEST['signed_request'];
		}
		
	}
	
	function checkRegistro($onlycheck=true) {
		$fb_user = $this->fbGetUserProfile($onlycheck);
		$error = '';
		if ($usr = $this->Usuario->login($fb_user, $error)) {
			if (isset($this->concurso)){
				switch($this->concurso){
					case 'jeans':
						if (!isset($usr['Usuario']['concierto_id'])) {
							if (!$onlycheck){
								$this->redirect('/usuarios/add/'.$this->concurso);
							}
						} else {
							$this->SessionUsuario = $usr['Usuario'];
						}
						break;
						
					case 'looks':
						if (!isset($usr['Usuario']['codigo'])) {
							if (!$onlycheck){
								$this->redirect('/usuarios/add/'.$this->concurso);
							}
						} else {
							$this->SessionUsuario = $usr['Usuario'];
						}
						break;
				}
			}else{
				if (empty($usr['Usuario']['dni']) || ($usr['Usuario']['dni']==0)) {
					if (!$onlycheck){
						$this->redirect('/usuarios/add/'.$this->concurso);
					}
				} else {
					$this->SessionUsuario = $usr['Usuario'];
				}
			}
		}
	}
	
	function checkLogin($onlycheck=false) {
		$fb_user = $this->fbGetUserProfile($onlycheck);
		$error = '';
		if ($usr = $this->Usuario->login($fb_user, $error)) {
			if (empty($usr['Usuario']['fbid']) || ($usr['Usuario']['fbid']==0)) {
				if (!$onlycheck){
					$this->redirect('/concurso/home/'.$this->concurso);
				}
			} else {
				$this->SessionUsuario = $usr['Usuario'];
			}
		}
	}

	
	function _loginSession($usr) {
		$this->SessionUsuario = $usr;
	}
	
	function _logoutSession() {
        $this->SessionUsuario = null;
	}

	function getUsuario() {
		return $this->SessionUsuario;
	}
	
	function fbGetUserProfile($onlycheck=false) {
		$facebook = $this->fbConnect();
		$user = $facebook->getUser();
		if ($user) {
			try {
				$user_profile = $facebook->api('/me');
				$token = $facebook->getAccessToken();
				$this->Session->write('atoken',$token);
			} catch(Exception $e) {
				if (!$onlycheck){
					$this->Session->write('atoken',null);
					$params = array('scope'=>'email,user_birthday');
					$loginUrl = $facebook->getLoginUrl($params);
					echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
					exit;
				}
			}
			return $user_profile;
		} else {
			if (!$onlycheck){
				$this->redirect('/concurso/home/'.$this->concurso);
			}
			else{return false;}
		}
	}
	
	function fbConnect() {
		// traeme el idfacebook
		App::import('Vendor', 'facebook/facebook');
		
		$config = array();
		$config['appId'] = '573736966005478';
		$config['secret'] = 'b6d89556a41d277ea09a9e278eac0c22';
		$config['cookie'] = true;
		$config['fileUpload'] = true;

		$facebook = new Facebook($config);
		
		if (!isset($_REQUEST['signed_request'])) {
			if (isset($_SESSION['signed_request'])) {
				$_REQUEST['signed_request'] = $_SESSION['signed_request'];
			}
		}
		
		$token = $this->Session->read('atoken');
		if ($token!=NULL)
		{
			$facebook->setAccessToken($token);
		}
		
		return $facebook;
	}
}
