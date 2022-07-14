<?php

namespace App\Http\Livewire\Calendar;

use LivewireUI\Modal\ModalComponent;

class EventDetail extends ModalComponent
{
    public function render()
    {
        return view('livewire.calendar.event-detail');
    }
}
