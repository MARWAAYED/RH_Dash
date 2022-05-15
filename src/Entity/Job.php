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
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="job")
     */
    private $job;

    /**
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="job")
     */
    private $applicants;

    public function __construct()
    {
        $this->job = new ArrayCollection();
        $this->applicants = new ArrayCollection();
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

    /**
     * @return Collection<int, Applicant>
     */
    public function getJob(): Collection
    {
        return $this->job;
    }

    public function addJob(Applicant $job): self
    {
        if (!$this->job->contains($job)) {
            $this->job[] = $job;
            $job->setJob($this);
        }

        return $this;
    }

    public function removeJob(Applicant $job): self
    {
        if ($this->job->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getJob() === $this) {
                $job->setJob(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(Applicant $applicant): self
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants[] = $applicant;
            $applicant->setJob($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicants->removeElement($applicant)) {
            // set the owning side to null (unless already changed)
            if ($applicant->getJob() === $this) {
                $applicant->setJob(null);
            }
        }

        return $this;
    }
}
