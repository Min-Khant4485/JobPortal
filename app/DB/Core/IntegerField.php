<?php

namespace App\DB\Core;

class IntegerField extends Field
{
  public function execute()
  {
    if (!$this->value) {
      return redirect()->back()
        ->with('error', 'Values are invalid!');
    }
    return $this->value;
  }
}
