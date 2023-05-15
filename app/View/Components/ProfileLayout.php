<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public User $user,
        public string $title,
        public string $subtitle
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.profile');
    }
}
