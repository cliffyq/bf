<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_user extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();
		parent::__construct();

		$this -> load -> library('form_validation');
		$this -> load -> model('user_model', null, true);
		$this -> lang -> load('user');
		//	Template::set_theme('two_column');
	}

	public function index()
	{
		$records = $this->load->model('video/video_model')->find_all();
		Template::set('records', $records);
		Template::set('toolbar_title', 'Userview');
		Template::set_theme('two_column');
		Template::render('user_index');
	}

	public function video_charts($sort_option = "viewcount",$time_filter='all',$per_page = 6, $offset = 0)
	{
			
		//selection setting
		switch($sort_option)
		{
			case 'viewcount': $selection['sort']['text']='Most Viewed';break;
			case 'toprated': $selection['sort']['text']='Top Rated';break;
			case 'brandnew': $selection['sort']['text']='Brand New';break;
		}
		$selection['sort']['data']=$sort_option;
		switch($time_filter)
		{
			case 'day': $selection['timefilter']['text']='Today';break;
			case 'week': $selection['timefilter']['text']='This Week';break;
			case 'month': $selection['timefilter']['text']='This Month';break;
			case 'all': $selection['timefilter']['text']='All';break;
		}
		$selection['timefilter']['data']=$time_filter;
			
		//pagination setting
		$this->load->library('pagination');
		$config=read_config('video_chart_pagination', TRUE, 'user');
		$config['base_url'] = base_url() . 'user/user_user/video_charts/'.$sort_option.'/'.$time_filter.'/'.$per_page.'/';
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 7;
			
		$this->load->model('video/video_model', null, true);
		$video_cards = $this->video_model->video_chart($sort_option,$time_filter,$config['per_page'], $this->uri->segment($config['uri_segment']));
		//$data['rows'] = $video_cards['rows'];
		$config['total_rows'] = $video_cards['row_count'];
		$this->pagination->initialize($config);
		$video_cards['pagination_links'] = $this->pagination->create_links();

		//Setting video cards
		$videos=array();
		foreach($video_cards['rows'] as $key=>$video_card)
		{
			$videos[$key]=$this->load->module('video')->video_card($video_card,$key+$offset);
		}


		Assets::add_js($this->load->view('inline_js/video_charts_pag_ajax.js.php',null,true),'inline');
		Assets::add_module_css('user','video_charts.css');
		Template::set('video_cards',$videos);
		Template::set('selection',$selection);
		Template::set('pagination_links',$video_cards['pagination_links']);
			
		if ($this->input->is_ajax_request())
			Template::set_view('user_user/video_charts_ajax');
		else
			Template::set_theme('two_column');

		Template::render('user_index');
			
	}
}



