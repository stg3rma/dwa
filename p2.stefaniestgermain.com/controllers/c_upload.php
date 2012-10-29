<?php  


class upload_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		}
	}

	 public function index()
    {
        $view = View::factory('crop/index');
        $this->response->body($view);
    }
 
    public function upload()
    {
        $view = View::factory('crop/do');
        $error_message = NULL;
        $filename = NULL;
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }
 
        if ( ! $filename)
        {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }
 
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;
        $this->response->body($view);
    }
 
    protected function save_image($image)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'uploads/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';
 
            $img = Image::factory($file);
 
            // Crop the image square half the height and crop from center
            $new_height = (int) $img->height / 2;
 
            $img->crop($new_height, $new_height)
                ->save($directory.$filename);
 
            // Delete the temporary file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }
} # end of the class