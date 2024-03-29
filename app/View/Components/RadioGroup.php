<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        // public array $options,
        public Collection $options,
        public $checked = null,
        public $mType = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
{
    return view('components.radio-group', [
        'options' => $this->options->map(function ($value, $key) {
            return ['key' => $key, 'value' => $value];
        })->toArray(),
        'mType' => $this->mType,
        'checked' => $this->checked,
    ]);
}

}
