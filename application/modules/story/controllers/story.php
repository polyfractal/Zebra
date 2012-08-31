<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('story_model', 'story');
    }

	public function index($page = 0)
	{
        // Page 1 is technically page zero
        if ($page == 1)
        {
            $page = 0;
        }

		// Get all stories
		$this->data['stories'] = $this->story->get_popular_stories(50, 0);

		$this->parser->parse('stories', $this->data);
	}

    public function submit()
    {
        $this->data['current_segment'] = "submit";
        
        if (!$this->input->post())
        {
            $this->parser->parse('add', $this->data);
        }    
    }
}

/* End of file story.php */