<?php
class NewsController extends Controller{
    public function __construct($data = []){
        parent::__construct($data);
        $this->model = new News();
    }

    public function index(){
        $this->data['index'] = $this->model->getALlNews();
        //echo 'Ми відобразили новину за допомогою методу index';
    }

    public function view(){
        $this->data['view'] = $this->model->getNews($this->params[0]);
        //echo 'Ми відобразили новину за допомогою методу view';
    }

    public function edit(){
        if(Session::get('status') === 'admin'){
            echo "Користувач може редагувати Новини";
        } else {
            echo 'Користувач звичайний і не може мати прав на редагування Новин';
        }
    }
}