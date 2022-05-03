<?php

namespace App\Entity;

use App\Repository\EmpolyeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpolyeeRepository::class)
 */
class Empolyee
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
    private $employee_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $work_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $work_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $manager;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $employee_contrats_wage;

    /**
     * @ORM\Column(type="float")
     */
    private $days_off_used;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeName(): ?string
    {
        return $this->employee_name;
    }

    public function setEmployeeName(string $employee_name): self
    {
        $this->employee_name = $employee_name;

        return $this;
    }

    public function getWorkPhone(): ?string
    {
        return $this->work_phone;
    }

    public function setWorkPhone(string $work_phone): self
    {
        $this->work_phone = $work_phone;

        return $this;
    }

    public function getWorkEmail(): ?string
    {
        return $this->work_email;
    }

    public function setWorkEmail(string $work_email): self
    {
        $this->work_email = $work_email;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getJobPosition(): ?string
    {
        return $this->job_position;
    }

    public function setJobPosition(string $job_position): self
    {
        $this->job_position = $job_position;

        return $this;
    }

    public function getManager(): ?string
    {
        return $this->manager;
    }

    public function setManager(?string $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getEmployeeContratsWage(): ?int
    {
        return $this->employee_contrats_wage;
    }

    public function setEmployeeContratsWage(?int $employee_contrats_wage): self
    {
        $this->employee_contrats_wage = $employee_contrats_wage;

        return $this;
    }

    public function getDaysOffUsed(): ?float
    {
        return $this->days_off_used;
    }

    public function setDaysOffUsed(float $days_off_used): self
    {
        $this->days_off_used = $days_off_used;

        return $this;
    }
}
