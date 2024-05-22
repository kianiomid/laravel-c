<?php

namespace App\DTO\Customer;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;

class CustomerDTO extends DataTransferObject
{
    /**
     * @var int|null
     */
    #[MapFrom('id')]
    #[MapTo('id')]
    public ?int $id;

    /**
     * @var string
     */
    #[MapFrom('first_name')]
    #[MapTo('first_name')]
    public string $firstName;

    /**
     * @var string
     */
    #[MapFrom('last_name')]
    #[MapTo('last_name')]
    public string $lastName;

    /**
     * @var string
     */
    #[MapFrom('date_of_birth')]
    #[MapTo('date_of_birth')]
    public string $dateOfBirth;

    /**
     * @var string
     */
    #[MapFrom('phone_number')]
    #[MapTo('phone_number')]
    public string $phoneNumber;

    /**
     * @var string
     */
    #[MapFrom('email')]
    #[MapTo('email')]
    public string $email;

    /**
     * @var string
     */
    #[MapFrom('bank_account_number')]
    #[MapTo('bank_account_number')]
    public string $bankAccountNumber;

    /**
     * @var string|null
     */
    #[MapFrom('created_at')]
    #[MapTo('created_at')]
    public ?string $createdAt;

    /**
     * @var string|null
     */
    #[MapFrom('updated_at')]
    #[MapTo('updated_at')]
    public ?string $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getBankAccountNumber(): string
    {
        return $this->bankAccountNumber;
    }

    public function setBankAccountNumber(string $bankAccountNumber): void
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
