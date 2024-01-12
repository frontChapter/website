<?php

namespace App\Livewire\User;

use App\Enums\AttributeTypeEnum;
use App\Models\UserAttribute;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class ListAdditional extends Component
{
    use Actions;

    public array $forms = [];

    public function rules(): array
    {
        return [
            'forms.*.key' => ['string', 'min:3', 'max:100'],
            'forms.*.value' => ['string', 'min:3', 'max:500'],
        ];
    }

    public function mount()
    {
        $attributes = auth()->user()->attributes()->selectRaw('*, type as sType')->get()->keyBy('sType')->toArray();

        foreach ($attributes as $attribute) {
            $this->forms[$attribute['type']] = [
                'value' => $attribute['value'],
                'key' => $attribute['key'],
            ];
        }
    }

    public function save()
    {
        $this->validate();

        foreach (AttributeTypeEnum::cases() as $case) {

            if(
                (!isset($this->forms[$case->value]['key']) && !isset($this->forms[$case->value]['value'])) ||
                (empty($this->forms[$case->value]['key']) && empty($this->forms[$case->value]['value']))
            ) {
                UserAttribute::whereUserId(auth()->id())->whereType($case->value)->delete();
            } else {
                UserAttribute::updateOrCreate(
                    [
                        'user_id' => auth()->id(),
                        'type' => $case->value,
                    ],
                    [
                        'key' => strip_tags($this->forms[$case->value]['key'] ?? null),
                        'value' => strip_tags($this->forms[$case->value]['value'] ?? null),
                    ]
                );
            }

        }

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.user.list-additional');
    }
}
