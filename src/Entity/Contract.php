<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractRepository::class)
 */
class Contract
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
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $date_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $wage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity=Employee::class, mappedBy="contract")
     */
    private $contract;

    /**
     * @ORM\OneToMany(targetEntity=Employee::class, mappedBy="contract")
     */
    private $employees;

    public function __construct()
    {
        $this->contract = new ArrayCollection();
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getWage(): ?float
    {
        return $this->wage;
    }

    public function setWage(?float $wage): self
    {
        $this->wage = $wage;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getContract(): Collection
    {
        return $this->contract;
    }

    public function addContract(Employee $contract): self
    {
        if (!$this->contract->contains($contract)) {
            $this->contract[] = $contract;
            $contract->setContract($this);
        }

        return $this;
    }

    public function removeContract(Employee $contract): self
    {
        if ($this->contract->removeElement($contract)) {
            // set the owning side to null (unless already changed)
            if ($contract->getContract() === $this) {
                $contract->setContract(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
            $employee->setContract($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getContract() === $this) {
                $employee->setContract(null);
            }
        }

        return $this;
    }
}
