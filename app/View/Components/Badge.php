<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public $badges;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($badges)
    {
        $this->badges = $badges;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $badges = explode(',',$this->badges);
        return view('components.badge',compact('badges'));
    }
}
