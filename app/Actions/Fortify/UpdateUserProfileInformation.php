<?php

namespace App\Actions\Fortify;

use App\Enums\SexEnum;
use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'min:3', 'max:69'],
            'last_name' => ['required', 'string', 'min:3', 'max:69'],
            'username' => ['regex:/[a-z0-9_]{3,15}[^-_]+$/', 'required', 'min:5', 'max:15', 'string', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'birth_date' => ['nullable', 'jdate:Y/m/d'],
            'sex' => ['nullable', Rule::enum(SexEnum::class)],
            'job_title' => ['required', 'string', 'min:3', 'max:69'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'username' => $input['username'],
                'email' => $input['email'],
                'bio' => strip_tags($input['bio']),
                'sex' => $input['sex'],
                'job_title' => $input['job_title'],
                'birth_date' => !empty($input['birth_date']) ? $input['birth_date'] : null,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'bio' => strip_tags($input['bio']),
            'sex' => $input['sex'],
            'job_title' => $input['job_title'],
            'birth_date' => !empty($input['birth_date']) ? $input['birth_date'] : null,
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
