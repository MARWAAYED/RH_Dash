<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job_title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $work_email;

    /**
     * @ORM\ManyToOne(targetEntity=Contract::class, inversedBy="employees")
     */
    private $contract;

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

    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    public function setJobTitle(?string $job_title): self
    {
        $this->job_title = $job_title;

        return $this;
    }

    public function getWorkEmail(): ?string
    {
        return $this->work_email;
    }

    public function setWorkEmail(?string $work_email): self
    {
        $this->work_email = $work_email;

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }
}
