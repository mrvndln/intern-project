<?php

namespace App\Livewire;

use Livewire\Component;

class SearchUser extends Component
{ 
    public $searchInput;

    public function search(){
        $this->dispatch('search-user', data: $this->searchInput);
    }

    public function render()
    {
        return view('livewire.search-user');
    }
}
