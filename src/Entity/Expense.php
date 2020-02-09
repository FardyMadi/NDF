<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpenseRepository")
 */
class Expense
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ExpenseLine", mappedBy="expense")
     */
    private $line;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tiltle;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\Column(type="date")
     */
    private $createdOn;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $refundedOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $refundedBy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $refundWay;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    public function __construct()
    {
        $this->line = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|ExpenseLine[]
     */
    public function getLine(): Collection
    {
        return $this->line;
    }

    public function addLine(ExpenseLine $line): self
    {
        if (!$this->line->contains($line)) {
            $this->line[] = $line;
            $line->setExpense($this);
        }

        return $this;
    }

    public function removeLine(ExpenseLine $line): self
    {
        if ($this->line->contains($line)) {
            $this->line->removeElement($line);
            // set the owning side to null (unless already changed)
            if ($line->getExpense() === $this) {
                $line->setExpense(null);
            }
        }

        return $this;
    }

    public function getTiltle(): ?string
    {
        return $this->tiltle;
    }

    public function setTiltle(string $tiltle): self
    {
        $this->tiltle = $tiltle;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getRefundedOn(): ?\DateTimeInterface
    {
        return $this->refundedOn;
    }

    public function setRefundedOn(?\DateTimeInterface $refundedOn): self
    {
        $this->refundedOn = $refundedOn;

        return $this;
    }

    public function getRefundedBy(): ?User
    {
        return $this->refundedBy;
    }

    public function setRefundedBy(?User $refundedBy): self
    {
        $this->refundedBy = $refundedBy;

        return $this;
    }

    public function getRefundWay(): ?string
    {
        return $this->refundWay;
    }

    public function setRefundWay(string $refundWay): self
    {
        $this->refundWay = $refundWay;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
