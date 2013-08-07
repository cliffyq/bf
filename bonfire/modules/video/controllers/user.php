
<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class user extends Admin_Controller {


	public function __construct() {
		parent::__construct();

		$this -> load -> library('form_validation');
		//$this -> load -> model('company/company_model', null, true);
		$this -> load -> model('video_model', null, true);
		$this -> lang -> load('video');
	}
	
	public function index(){
		
	}
	
	
	
}