<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $no_of_employee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $no_of_recruitment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $no_of_hired_employee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $requirements;

    /**
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="job_id")
     */
    private $Applicant_job;

    public function __construct()
    {
        $this->Applicant_job = new ArrayCollection();
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

    public function getNoOfEmployee(): ?int
    {
        return $this->no_of_employee;
    }

    public function setNoOfEmployee(?int $no_of_employee): self
    {
        $this->no_of_employee = $no_of_employee;

        return $this;
    }

    public function getNoOfRecruitment(): ?int
    {
        return $this->no_of_recruitment;
    }

    public function setNoOfRecruitment(?int $no_of_recruitment): self
    {
        $this->no_of_recruitment = $no_of_recruitment;

        return $this;
    }

    public function getNoOfHiredEmployee(): ?int
    {
        return $this->no_of_hired_employee;
    }

    public function setNoOfHiredEmployee(?int $no_of_hired_employee): self
    {
        $this->no_of_hired_employee = $no_of_hired_employee;

        return $this;
    }

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): self
    {
        $this->requirements = $requirements;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getApplicantJob(): Collection
    {
        return $this->Applicant_job;
    }

    public function addApplicantJob(Applicant $applicantJob): self
    {
        if (!$this->Applicant_job->contains($applicantJob)) {
            $this->Applicant_job[] = $applicantJob;
            $applicantJob->setJobId($this);
        }

        return $this;
    }

    public function removeApplicantJob(Applicant $applicantJob): self
    {
        if ($this->Applicant_job->removeElement($applicantJob)) {
            // set the owning side to null (unless already changed)
            if ($applicantJob->getJobId() === $this) {
                $applicantJob->setJobId(null);
            }
        }

        return $this;
    }
}
