<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Vacancies;

class Slider extends Component
{

    public $vacanciesCnt;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vacanciesCnt = Vacancies::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
