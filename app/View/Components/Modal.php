<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $close;
    public $size;
    public function __construct($id, $close = true, $size = 'w-11/12 xs:w-11/12 sm:w-11/12 md:w-2/4')
    {
        $this->id = $id;
        $this->size = $size;
        $this->close = $close;
    }

    public function render()
    {
        return view('components.modal');
    }
}
