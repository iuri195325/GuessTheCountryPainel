<?php

namespace App\Livewire\Country;

use App\Models\country;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required',  message: 'Campo Obrigatório')] 
    public string $countryName = '';

    #[Validate('required', message: 'Campo Obrigatório')]
    #[Validate('image', message: 'O Arquivo deve ser uma Imagem')]
    public $countryIconFlag;

    #[Validate('required', message: 'Campo Obrigatório')]
    #[Validate('image', message: 'O Arquivo deve ser uma Imagem')]
    public $countryMapImage;
    public $isEditForm = false;

    public function save(){
        $this->validate();

        $randomfilenameIcon = Str::random(40) . '.' . $this->countryIconFlag->getClientOriginalExtension();
        $file_name_icon_flag =  $this->countryIconFlag->storePubliclyAs('uploads', $randomfilenameIcon, 'public');

        $randomfilenameflag = Str::random(40) . '.' . $this->countryMapImage->getClientOriginalExtension();
        $file_map_image =$this->countryMapImage->storePubliclyAs('uploads', $randomfilenameflag, 'public');

        DB::beginTransaction();

        try {
            country::create(["country_name" => $this->countryName, 
                "country_icon_flag_file_code" => $file_name_icon_flag,
                "country_world_map_img_file_code" =>  $file_map_image,
            ]);

            DB::commit();
            session()->flash('status', 'Post successfully updated.');
            $this->restFields();
            $this->dispatch('country-created'); 
        } catch (\Exception $e){
            DB::rollback();
        }

        session()->flash('message', 'Post successfully updated.');
    }

    public function editarCountry(){
        $this->validate();
    }

    #[On('edit-country')] 
    public function setFieldValueToEdit($country){
        $this->isEditForm = true;
        $this->countryName = $country['country_name'];
        $this->countryIconFlag = $country['country_icon_flag_file_code'];
        $this->countryMapImage = $country['country_world_map_img_file_code'];
    }


    public function restFields(){
        $this->countryName = '';
        $this->countryIconFlag = null;
        $this->countryMapImage = null;
    }

    public function render()
    {
        return view('livewire.country.create');
    }
}
