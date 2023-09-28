<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserLayout extends Component
{
    public function __construct(public $title = null)
    {
        $this->title = $title ? $title . ' / ' . config('app.name') : config('app.name');
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return view('layouts.user-layout');
    }
}
