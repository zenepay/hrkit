<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count;

    public function mount()
    {
        $this->count = 10;
    }

    public function updated()
    {
        //dd('updated');
    }

    public function add($num)
    {
        $this->count += $num;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
