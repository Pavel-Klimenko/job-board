<?php

namespace App\View\Components;

use App\Models\Roles;
use Illuminate\View\Component;

class AdminMenu extends Component
{

    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roles = Roles::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-menu');
    }
}
