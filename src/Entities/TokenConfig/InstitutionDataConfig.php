<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class InstitutionDataConfig
{
	protected ?string $routingNumber = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setRoutingNumber($data['routing_number'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'routing_number' => $this->routingNumber,
		], fn($value) => $value !== null);
	}

	public function getRoutingNumber(): ?string
	{
		return $this->routingNumber;
	}

	public function setRoutingNumber(?string $routingNumber): self
	{
		$this->routingNumber = $routingNumber;
		return $this;
	}
}