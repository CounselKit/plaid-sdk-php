<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class StatedIncomeSourceConfig
{
	protected ?string $employer = null;
	protected ?string $category = null;
	protected ?float $payPerCycle = null;
	protected ?float $payAnnual = null;
	protected ?string $payType = null;
	protected ?string $payFrequency = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setEmployer($data['employer'] ?? null)
			->setCategory($data['category'] ?? null)
			->setPayPerCycle($data['pay_per_cycle'] ?? null)
			->setPayAnnual($data['pay_annual'] ?? null)
			->setPayType($data['pay_type'] ?? null)
			->setPayFrequency($data['pay_frequency'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'employer' => $this->employer,
			'category' => $this->category,
			'pay_per_cycle' => $this->payPerCycle,
			'pay_annual' => $this->payAnnual,
			'pay_type' => $this->payType,
			'pay_frequency' => $this->payFrequency,
		], fn($value) => $value !== null);
	}

	public function getEmployer(): ?string
	{
		return $this->employer;
	}

	public function setEmployer(?string $employer): self
	{
		$this->employer = $employer;
		return $this;
	}

	public function getCategory(): ?string
	{
		return $this->category;
	}

	public function setCategory(?string $category): self
	{
		$this->category = $category;
		return $this;
	}

	public function getPayPerCycle(): ?float
	{
		return $this->payPerCycle;
	}

	public function setPayPerCycle(?float $payPerCycle): self
	{
		$this->payPerCycle = $payPerCycle;
		return $this;
	}

	public function getPayAnnual(): ?float
	{
		return $this->payAnnual;
	}

	public function setPayAnnual(?float $payAnnual): self
	{
		$this->payAnnual = $payAnnual;
		return $this;
	}

	public function getPayType(): ?string
	{
		return $this->payType;
	}

	public function setPayType(?string $payType): self
	{
		$this->payType = $payType;
		return $this;
	}

	public function getPayFrequency(): ?string
	{
		return $this->payFrequency;
	}

	public function setPayFrequency(?string $payFrequency): self
	{
		$this->payFrequency = $payFrequency;
		return $this;
	}
}