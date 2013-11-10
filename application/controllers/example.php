<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
	}
	
	//CALL THIS METHOD FIRST BY GOING TO
	//www.your_url.com/index.php/request_youtube
	public function request_youtube()
	{
		$params['key'] = '889768133636.apps.googleusercontent.com';
		$params['secret'] = 'UmgKCmRiN62V52CU-u65ezM2';
		$params['algorithm'] = 'HMAC-SHA1';
		
		$this->load->library('google_oauth', $params);
		$data = $this->google_oauth->get_request_token(site_url('example/access_youtube'));
		$this->session->set_userdata('token_secret', $data['token_secret']);
		redirect($data['redirect']); 
	}
	
	//This method will be redirected to automatically
	//once the user approves access of your application
	public function access_youtube()
	{
		$params['key'] = '889768133636.apps.googleusercontent.com';
		$params['secret'] = 'UmgKCmRiN62V52CU-u65ezM2';
		$params['algorithm'] = 'HMAC-SHA1';
		
		$this->load->library('google_oauth', $params);
		
		$oauth = $this->google_oauth->get_access_token(false, $this->session->userdata('token_secret'));
		
		$this->session->set_userdata('oauth_token', $oauth['oauth_token']);
		$this->session->set_userdata('oauth_token_secret', $oauth['oauth_token_secret']);
	}
	
	//This method can be called without having
	//done the oauth steps
	public function youtube_no_auth()
	{
		$params['apikey'] = 'AIzaSyDHJyVlsjx79lurIgbnL-czMcRsKG1-U_Q';
		
		$this->load->library('youtube', $params);
		echo $this->youtube->getKeywordVideoFeed('pac man');
	}
	
	//This method can be called after you executed
	//the oauth steps
	public function youtube_auth()
	{
		$params['apikey'] = 'AIzaSyDHJyVlsjx79lurIgbnL-czMcRsKG1-U_Q';
		$params['oauth']['key'] = '889768133636.apps.googleusercontent.com';
		$params['oauth']['secret'] = 'UmgKCmRiN62V52CU-u65ezM2';
		$params['oauth']['algorithm'] = 'HMAC-SHA1';
		$params['oauth']['access_token'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
												 'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
		
		$this->load->library('youtube', $params);
		echo $this->youtube->getUserUploads();
	}
	
	public function direct_upload()
	{
		$videoPath = '/opt/lampp/htdocs/html5/upload/tales.mov';
		$videoType = 'THE CONTENT TYPE OF THE VIDEO'; //This is the mime type of the video ex: 'video/3gpp'
		
		$params['apikey'] = 'AIzaSyDHJyVlsjx79lurIgbnL-czMcRsKG1-U_Q';
		$params['oauth']['key'] = 'AI39si63fCQx9uFEcM6eA5XoxdV7xnX6HMt2mM-TzeLU7hgJz4bkwTp19En2E6AwAlsLGqRYZJDmZFBhl-JcZZj_3xTCcaMdYw';
		$params['oauth']['secret'] = 'UmgKCmRiN62V52CU-u65ezM2';
		$params['oauth']['algorithm'] = 'HMAC-SHA1';
		$params['oauth']['access_token'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
												 'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
		print_r($params);
		$this->load->library('youtube', $params);
		
		$metadata = '<entry xmlns="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" xmlns:yt="http://gdata.youtube.com/schemas/2007"><media:group><media:title type="plain">Test Direct Upload</media:title><media:description type="plain">Test Direct Uploading.</media:description><media:category scheme="http://gdata.youtube.com/schemas/2007/categories.cat">People</media:category><media:keywords>test</media:keywords></media:group></entry>';
		echo $this->youtube->directUpload($videoPath, $videoType, $metadata);
	}
}

/* End of file example.php */
/* Location: ./application/controllers/example.php */