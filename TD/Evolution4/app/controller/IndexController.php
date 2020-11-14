<?php

class IndexController extends Controller
{

    public function display() {

        $this->vue->setData (Item::getList());
        $this->vue->display ();

    }

}