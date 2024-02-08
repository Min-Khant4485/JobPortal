<?php

namespace App\View\Components;

use App\Models\Common;
use App\Models\Currency;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public function __construct(
        //  $options = [];
        public array|object $options = [],
        public string $model,
        public $selected = null,
        public $mType = null,
        public $name = null
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->options);
        // $options = [];

       // Call the appropriate function from the Common model based on $mType
        // if ($this->mType === 'acadType') {
        //     $this->options = Common::getAcadType($this->selected);
        // } elseif ($this->mType === 'currency') {
        //     $this->options = Common::getCurrency($this->selected);
        // } elseif ($this->mType === 'jobType') {
        //     $this->options = Common::getJobType($this->selected);
        // }

        //  dd($this->mType);

        return view('components.dropdown', [
            'options' => $this->options,
            'mType' => $this->mType,
            'selected' => $this->selected
        ]);
    }
}
