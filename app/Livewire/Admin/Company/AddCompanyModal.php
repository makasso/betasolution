<?php

namespace App\Livewire\Admin\Company;

use App\Models\Industry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class AddCompanyModal extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $role;
    public $avatar;
    public $saved_avatar;
    public $edit_mode = false;
    public $currentStep = 1;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'role' => 'required|string',
        'avatar' => 'nullable|sometimes|image|max:1024',
    ];

    protected $listeners = [
        'delete_company' => 'deleteCompany',
        'update_company' => 'updateCompany',
        'new_company' => 'hydrate',
    ];

    public function render()
    {
        $industries = Industry::all();
        $entries = scandir(public_path('assets/media/flags'));

        $flags = [];
        $i = 0;
        foreach($entries as $entry) {
            if ($entry !== '.' && $entry !== '..') {
                $path = public_path('assets/media/flags') . '/' . $entry;
                if (is_file($path)) {
                    $flags[$i]['file'] = $entry;
                    $flags[$i]['name'] = ucwords(str_replace('-', ' ', str_replace('.svg', '', $entry)));
                    $i++;
                }
            }
        }
        return view('livewire.admin.company.add-company-modal', compact('industries', 'flags'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteCompany($id)
    {
        // Prevent deletion of current user
        if ($id == Auth::id()) {
            $this->dispatch('error', trans('admin/app.general.delete_not'));
            return;
        }
        // Delete the user record with the specified ID
        User::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', trans('admin/app.general.deleted_successfully'));
    }

    public function updateCompany($id)
    {

    }

    public function stepDown(): void
    {
        $this->currentStep--;
    }

    public function stepUp(): void
    {
        $this->currentStep++;
    }

    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }
}
