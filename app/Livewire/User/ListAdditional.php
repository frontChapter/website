<?php

namespace App\Livewire\User;

use App\Enums\AttributeTypeEum;
use App\Models\UserAttribute;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class ListAdditional extends Component
{
    use Actions;

    public array $forms = [];

    public AttributeTypeEum $type = AttributeTypeEum::Link;

    public function rules(): array
    {
        return [
            'forms.*.type' => ['string', 'min:3', 'max:256', Rule::enum(AttributeTypeEum::class)],
            'forms.*.key' => ['string', 'min:3', 'max:100'],
            'forms.*.value' => ['string', 'min:3', 'max:500'],
        ];
    }

    public function add()
    {
        if (
            !UserAttribute::whereType($this->type->value)
            ->whereUserId(auth()->id())
            ->count()
        ) {
            $this->forms[] = [
                'key' => '',
                'value' => '',
                'typeInstance' => $this->type,
                'type' => $this->type->value,
            ];
        } else {
            $this->notification()->error(
                __('Error'),
                __('This item has already been created.'),
            );
        }
    }


    public function save($index)
    {
        $this->validateOnly("forms.$index");

        UserAttribute::create([
            'user_id' => auth()->id(),
            'key' => strip_tags($this->forms[$index]['key']),
            'value' => strip_tags($this->forms[$index]['value']),
            'type' => strip_tags($this->forms[$index]['type']),
        ]);

        unset($this->forms[$index]);
    }

    public function delete($id)
    {
        $userAttribute = UserAttribute::find($id);

        if (!is_null($userAttribute) && $userAttribute->user_id === auth()->id()) {
            $userAttribute->delete();
        }
    }

    public function render()
    {
        return view('livewire.user.list-additional', [
            'attributes' => auth()->user()->attributes
        ]);
    }
}
