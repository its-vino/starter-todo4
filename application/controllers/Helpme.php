<?php
/**
 * Created by PhpStorm.
 * User: vincentlee
 * Date: 2017-10-12
 * Time: 10:27 PM
 */

class Helpme extends Application
{

    public function index() {
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }

}