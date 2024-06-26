<?php
    class Contact extends Controller {
        public function index() {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['age'] = $_POST['age'];
            $data['message'] = $_POST['message'];
            if(isset($_POST['name'])) {
                $mail = $this->model('ContactForm');

                $result = $mail->mail($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
                if($result == "Сообщение отправлено.") {
                    $data = [];
                }
                $data['result'] = $result;
            }

            $this->view('contact/index', $data);
        }

        public function about() {
            $this->view('contact/about');
        }
    }