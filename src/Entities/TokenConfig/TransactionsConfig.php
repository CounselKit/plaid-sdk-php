<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class TransactionsConfig
{
	protected ?int $daysRequested = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setDaysRequested($data['days_requested'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'days_requested' => $this->daysRequested,
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
}