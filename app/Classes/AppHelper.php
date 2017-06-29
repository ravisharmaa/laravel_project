<?php

class AppHelper
{
    private $states;

    public function __construct($states)
    {
        $this->states= $states;
    }

    public function getMessageTemplate()
    {
        $html =     '<div class="alert alert-'.$state.'">
                        
                    </div>';
    }
}