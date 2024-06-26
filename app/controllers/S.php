<?php

class S extends Controller {

    public function process($short) {
        $data=[];
        $process = $this->model('sModel');



        $data['long_url'] = $process->getProcess($short);

        $this->view('s/process', $data);
    }}


