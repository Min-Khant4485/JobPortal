<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public function __construct(
        public array|object $headers = [],
        public array|object $rows = []
    ) {
    }

    public function render()
    {
        return view(
            'components.table',
            [
                'headers' => $this->headers,
                'rows' => $this->rows
            ]
        );
    }
}
