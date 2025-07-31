<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class BankIncomeConfig
{
	protected ?int $daysRequested = null;
	protected ?bool $enableMultipleItems = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setDaysRequested($data['days_requested'] ?? null)
			->setEnableMultipleItems($data['enable_multiple_items'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'days_requested' => $this->daysRequested,
			'enable_multiple_items' => $this->enableMultipleItems,
		], fn($value) => $value !== null);
	}

	public function getDaysRequested(): ?int
	{
		return $this->daysRequested;
	}

	public function setDaysRequested(?int $daysRequested): self
	{
		$this->daysRequested = $daysRequested;
		return $this;
	}

	public function getEnableMultipleItems(): ?bool
	{
		return $this->enableMultipleItems;
	}

	public function setEnableMultipleItems(?bool $enableMultipleItems): self
	{
		$this->enableMultipleItems = $enableMultipleItems;
		return $this;
	}
}