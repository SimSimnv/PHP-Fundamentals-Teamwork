<?php


namespace ForumServices\EncryptionServices;


class EncryptionService implements EncryptionServiceInterface
{
    public function encrypt($password): string
    {
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public function isValid($passwordHash, $passwordString): bool
    {
        return password_verify($passwordString,$passwordHash);
    }
}