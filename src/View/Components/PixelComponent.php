<?php

namespace EcomInsight\LaravelAnalytics\View\Components;

use Illuminate\View\Component;

class PixelComponent extends Component
{
    public function render()
    {
        return view('analytics::components.pixel');
    }
}
