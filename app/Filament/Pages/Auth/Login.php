<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Login as AuthLogin;

class Login extends AuthLogin
{
    /**
     * Get the email form component.
     */
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('mail')
            ->label(__('filament-panels::pages/auth/login.form.email.label'))
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    /**
     * Get the password form component.
     */
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'mail' => $data['mail'],
            'password' => $data['password'],
        ];
    }
}