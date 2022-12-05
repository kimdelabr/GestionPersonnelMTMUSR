<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newUser = [];
    public $editUser = [];

    public $rolePermissions = [];
    
    /*protected $rules = [
            'newUser.name' => 'required',
            'newUser.prenom' => 'required',
            'newUser.phone' => 'required',
            'newUser.annee_prise_service' => 'required',
            'newUser.annee_cessation_service' => 'required',
            'newUser.rib' => 'required',
            'newUser.email' => 'required',

    ] ;*/

    public function render()
    {

        
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.name' => 'required',
                'editUser.prenom' => 'required',
                'editUser.phone' => ['required', 'numeric', Rule::unique("users", "phone")->ignore($this->editUser['id']) ]  ,
                'editUser.annee_prise_service' => ['required'],
                'editUser.annee_cessation_service' => 'required',
                'editUser.rib' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,
            ];
        }

        return  [
            'newUser.name' => 'required',
            'newUser.prenom' => 'required',
            'newUser.phone' => 'required',
            'newUser.annee_prise_service' => 'required',
            'newUser.annee_cessation_service' => 'required',
            'newUser.rib' => 'required',
            'newUser.email' => 'required',

    ] ;
    }



    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions();
    }

    public function goToListUser(){
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }


    public function populateRolePermissions(){
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function($value){
            return $value["id"];
        };

        $roleIds =  array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray()); // [1, 2, 4]
        $permissionIds =array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray()); // [1, 2, 4]
         
        foreach(Role::all() as $role){
            if(in_array($role->id, $roleIds)){
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
            }
        }

        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
            }
        }

        
        //dump($this->rolePermissions);
        
        // la logique pour charger les roles et les permissions
    }

    public function updateRoleAndPermissions(){
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        DB::table("user_permission")->where("user_id", $this->editUser["id"])->delete();


        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->roles()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Role(s) et permission(s) créé mis à jour avec succès!"]);
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

    public function updateUser(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);

    }


    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning"
        ]]);
    }

    public function resetPassword(){

        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur réinitialisé avec succès!"]);
    }



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id){
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
    }

}
