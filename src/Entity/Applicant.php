<?php

namespace App\Entity;

use App\Repository\ApplicantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicantRepository::class)
 */
class Applicant
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
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email_form;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $create_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $priority;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $salary_proposed;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $salary_expected;

    /**
     * @ORM\ManyToOne(targetEntity=Stage::class, inversedBy="job_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stage_id;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="Applicant_job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job_id;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmailForm(): ?string
    {
        return $this->email_form;
    }

    public function setEmailForm(?string $email_form): self
    {
        $this->email_form = $email_form;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(?\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(?string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getSalaryProposed(): ?float
    {
        return $this->salary_proposed;
    }

    public function setSalaryProposed(?float $salary_proposed): self
    {
        $this->salary_proposed = $salary_proposed;

        return $this;
    }

    public function getSalaryExpected(): ?float
    {
        return $this->salary_expected;
    }

    public function setSalaryExpected(?float $salary_expected): self
    {
        $this->salary_expected = $salary_expected;

        return $this;
    }

    public function getStageId(): ?Stage
    {
        return $this->stage_id;
    }

    public function setStageId(?Stage $stage_id): self
    {
        $this->stage_id = $stage_id;

        return $this;
    }

    public function getJobId(): ?Job
    {
        return $this->job_id;
    }

    public function setJobId(?Job $job_id): self
    {
        $this->job_id = $job_id;

        return $this;
    }
}
