<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $isBtnClicked = false;

    public $newUser = [];

    
    protected $rules = [
            'newUser.name' => 'required',
            'newUser.prenom' => 'required',
            'newUser.phone' => 'required',
            'newUser.annee_prise_service' => 'required',
            'newUser.annee_cessation_service' => 'required',
            'newUser.rib' => 'required',
            'newUser.email' => 'required',

    ] ;

    public function render()
    {

        
        return view('livewire.utilisateurs.index', [
            "users" => User::lastest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }




    public function goToAddUser(){
        $this->isBtnClicked = true;
    }

    public function goToListUser(){
        $this->isBtnClicked = false;
    }

    public function addUser(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newUser"]["password"] = "password";

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];
       
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
       
    }

}
