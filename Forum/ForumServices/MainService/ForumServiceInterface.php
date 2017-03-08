<?php


namespace ForumServices\MainService;


interface ForumServiceInterface
{
    public function register(string $username, string $email, string $password, string $confirm);
    public function login(string $username, string $password);
}