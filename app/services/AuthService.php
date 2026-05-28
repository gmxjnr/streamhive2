<?php

class AuthService {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register($data) {

        // Check of Email voldoet aan het juiste formaat
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Ongeldig Email formaat");
        }

        // Check of wachtwoord voeldoet aan minimale eisen
        if (strlen($data['password']) < 6) {
            throw new Exception("Wachtwoord moet minimaal 6 tekens lang zijn");
        }

        // Check of Email al bestaat
        if ($this->user->emailExists($data['email'])) {
            throw new Exception("Email bestaat al");
        }
        return $this->user->register($data);
    }

    public function login($emailOrUsername, $password){
        if (empty($emailOrUsername) || empty($password)) {
            throw new Exception("Email/Username en wachtwoord zijn verplicht");
        }
        $user = $this->user->login($emailOrUsername, $password);
        if (!$user) {
            throw new Exception("Gebruikersnaam/Email of wachtwoord is onjuist");
        }
        return $user;
    }
}