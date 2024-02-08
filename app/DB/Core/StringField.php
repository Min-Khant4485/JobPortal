<?php

namespace App\DB\Core;

class StringField extends Field
{

    public function execute()
    {
        if (!$this->value) {
            return redirect()->back()
                ->with('error', 'Inputs are invalid.');
        }
        return $this->value;
    }
}
