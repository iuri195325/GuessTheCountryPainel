<?php

namespace App\Livewire\Country;

use Livewire\Component;
use App\Models\country;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class TableList extends Component
{
    use WithPagination;

    #[On('country-created')] 
    public function render()
    {
        return view('livewire.country.table-list', ['countrys' => country::paginate(10)]);
    }

    public function deleteCountry($countryId){
        country::where('id', $countryId)->delete();
    }

    public function updateCountry($country){
        $this->dispatch('edit-country', country: $country); 
    }
}
