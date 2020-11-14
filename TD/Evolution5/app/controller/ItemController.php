<?php

class ItemController extends Controller
{

    public function display() {

        $slug = $this->route["params"]["slug"];
        $this->vue->setData (Item::getFromSlug($slug));
        $this->vue->display ();

    }

}