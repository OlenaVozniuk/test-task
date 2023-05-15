<?php

namespace App\Services\Auth\Contracts;

interface LoginServiceInterface
{
    /**
     * @param array $credentials
     * @return bool
     */
    public function processLogin(array $credentials): bool;

    /**
     * @return void
     */
    public function logout(): void;
}
