<?php

class User
{
    private string $name;
    private string $email;
    private float $rating;
    private string $password;
    private ?int $id = null;

    public function __construct(string $name, string $email, string $password, float $rating = 0)
    {
        $this->name = $name;
        $this->email = $email;
        $this->rating = $rating;
        $this->password = $password;
        $this->id = 0;
    }
    public function PasswordIsCorrect(string $pass): bool
    {
        return $this->password == $pass;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }


    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if ($this->id == 0)
            $this->id = $id;
    }

    public function __toString(): string
    {
       return $this->name;
    }

}