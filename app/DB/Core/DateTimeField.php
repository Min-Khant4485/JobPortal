<?php

namespace App\DB\Core;

use Carbon\Carbon;

class DateTimeField extends Field
{
  public function execute()
  {
    if (!$this->value) {
      return redirect()->back()
        ->with('error', 'Date is invalid!');
    }
    return Carbon::parse($this->value)->toDateTimeString();
  }
}
