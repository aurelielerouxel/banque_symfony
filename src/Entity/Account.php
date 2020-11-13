<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountRepository::class)
 */
class Account
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $account_type;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $account_number;

    /**
     * @ORM\Column(type="date")
     */
    private $opening_date;

    /**
     * @ORM\Column(type="float")
     */
    private $account_amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountType(): ?string
    {
        return $this->account_type;
    }

    public function setAccountType(string $account_type): self
    {
        $this->account_type = $account_type;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    public function setAccountNumber(string $account_number): self
    {
        $this->account_number = $account_number;

        return $this;
    }

    public function getOpeningDate(): ?\DateTimeInterface
    {
        return $this->opening_date;
    }

    public function setOpeningDate(\DateTimeInterface $opening_date): self
    {
        $this->opening_date = $opening_date;

        return $this;
    }

    public function getAccountAmount(): ?float
    {
        return $this->account_amount;
    }

    public function setAccountAmount(float $account_amount): self
    {
        $this->account_amount = $account_amount;

        return $this;
    }
}
