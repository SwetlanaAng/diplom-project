<?php
    class Home extends Controller {
        public function index() {
            $data = [];
            if(isset($_POST['name'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass']);

                $isValid = $user->validForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
                $data['urls'] = "";
            } else if($_COOKIE['login']!='') {
                $url = $this->model('UrlModel');

                if(isset($_POST['long'])){
                    $url->setData($_POST['long'], $_POST['short']);
                    $isValidShort = $url->validShort();
                    if($isValidShort == "Верно") {
                        $url->addShort();
                    }
                    else
                        $data['message'] = $isValidShort;
                }
                if(isset($_POST['delete_url'])){
                    $url->deleteUrl($_POST['delete_url']);
                }
                $data['urls'] = $url->list();


            }

            $this->view('home/index', $data);
        }
    }