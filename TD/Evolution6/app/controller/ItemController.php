<?php

class ItemController extends Controller
{

    public function display() {

        $slug = $this->route["params"]["slug"];
        $this->vue->setData (Item::getFromSlug($slug));
        $this->vue->display ();

    }

    public function edit() {

        $this->vue->setData (Item::getFromSlug($this->route["params"]["slug"]));
        $this->vue->display ();

    }

    public function do_edit() {

        Item::updateFromSlug($this->route['params']);
        $this->vue->setData(Item::getFromSlug($this->route['params']['slug']));
        $this->vue->display ();

    }

}