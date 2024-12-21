<?php
class BlogController extends Controller
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->model = new Blog();
    }

    public function index(){
        $this->data['index'] = $this->model->getAllBlog();
        //echo 'Ми відобразили новину за допомогою методу index';
    }

    public function view(){
        $this->data['view'] = $this->model->getBlog($this->params[0]);
        //echo 'Ми відобразили новину за допомогою методу view';
    }

}