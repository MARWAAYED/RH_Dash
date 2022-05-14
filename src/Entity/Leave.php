<?php

namespace App\Entity;

use App\Repository\LeaveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeaveRepository::class)
 * @ORM\Table(name="`leave`")
 */
class Leave
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $private_name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_from;

    /**
     * @ORM\Column(type="date")
     */
    private $date_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $number_of_days;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrivateName(): ?string
    {
        return $this->private_name;
    }

    public function setPrivateName(string $private_name): self
    {
        $this->private_name = $private_name;

        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->date_from;
    }

    public function setDateFrom(?\DateTimeInterface $date_from): self
    {
        $this->date_from = $date_from;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getNumberOfDays(): ?float
    {
        return $this->number_of_days;
    }

    public function setNumberOfDays(?float $number_of_days): self
    {
        $this->number_of_days = $number_of_days;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }
}
