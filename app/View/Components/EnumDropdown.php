<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnumDropdown extends Component
{
    public string $wireModel;
    public string $enum;
    public string $value;

    public function __construct(string $wireModel, string $enum, string $value)
    {
        $this->wireModel = $wireModel;
        $this->enum = $enum;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.enum-dropdown');
    }
}
