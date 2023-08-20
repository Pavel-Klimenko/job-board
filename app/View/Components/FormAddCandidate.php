<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Containers\Vacancies\Models\JobCategories;

class FormAddCandidate extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = JobCategories::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-add-candidate');
    }
}
