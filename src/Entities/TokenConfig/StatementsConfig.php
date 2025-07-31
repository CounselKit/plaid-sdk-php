<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class StatementsConfig
{
	protected ?string $startDate = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setStartDate($data['start_date'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'start_date' => $this->startDate,
		], fn($value) => $value !== null);
	}

	public function getStartDate(): ?string
	{
		return $this->startDate;
	}

	public function setStartDate(?string $startDate): self
	{
		$this->startDate = $startDate;
		return $this;
	}
}