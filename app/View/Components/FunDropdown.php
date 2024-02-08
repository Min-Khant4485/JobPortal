<?php

namespace App\View\Components;

use App\Models\Common;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FunDropdown extends Component
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
        // Call the appropriate function from the Common model based on $mType
        $options = match ($this->mType) {
            'acadType' => Common::getAcadType($this->selected),
            'currency' => Common::getCurrency($this->selected),
            'jobType' => Common::getJobType($this->selected),
            'jobStatus' => Common::getJobPostStatus($this->selected),
            default => collect(), // Default to an empty collection if $mType is not recognized.
        };

        return view('components.fun-dropdown', [
            'options' => $options,
            'mType' => $this->mType,
            'selected' => $this->selected,
        ]);
    }

}
