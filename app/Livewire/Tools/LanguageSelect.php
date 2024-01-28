<?php

namespace App\Livewire\Tools;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSelect extends Component
{
    /** @var string */
    public $locale;

    public function mount(): void
    {
        $this->locale = 'fa';
        if (Session::has('locale')) {
            $this->locale = Session::get('locale');
        }
    }

    public function updatedLocale(): void
    {
        Session::put('locale', $this->locale);
        $this->redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.tools.language-select');
    }
}
