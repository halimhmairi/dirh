<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoModal extends Component
{
   public $type;
   public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$data)
    {
       $this->type = $type;
       $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-modal');
    }
}
