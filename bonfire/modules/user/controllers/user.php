<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
	 Method: index()

	Displays a list of form data.
	*/
	public function index()
	{
		Template::redirect('user/user_user/video_charts');
	}

	public function view($id = false)
	{
		if($id === false) Template::redirect('user');
		Assets::clear_cache();
		//ajax js
		Assets::add_module_js('ajax','jquerycookie.js');
		Assets::add_module_js('ajax','ajax.js');
			
		//add review panel
		$review_panel = $this->load->module('reviews')->_review_panel($id);

		$comment_panel=$this->load->module('comment')->comment_panel($id);
			
		$video_panel=$this->load->module('video')->_video_panel($id);
			
		Template::set('review_panel', $review_panel);
		Template::set('comment_panel', $comment_panel);
		Template::set('video_panel',$video_panel);
		Template::set('toolbar_title', 'Userview');
		Template::set('id',$id);
		Template::set_theme('two_column');
		Template:: render('user_index');
	}



	//--------------------------------------------------------------------
	public function save_data()
	{
		$records['records'] = $this->comment_model->find_all();
		$this->load->view('content/save_data',$records);
	}
	
	public function show_random_video(){
		
		$result=$this->load->model('video/video_model')->get_random_video();
		//console::log($result);
		if($result===false) Template::redirect('/');
		Template::redirect('/user/view/'.$result[0]->id);
	}

}
