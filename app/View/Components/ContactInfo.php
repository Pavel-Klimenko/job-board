<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Constants;

class ContactInfo extends Component
{

    public $address;
    public $phone;
    public $email;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->address = Constants::ADDRESS;
        $this->phone = Constants::PHONE;
        $this->email = Constants::EMAIL;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-info');
    }
}
