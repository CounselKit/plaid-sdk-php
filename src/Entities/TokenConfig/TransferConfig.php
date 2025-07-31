<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class TransferConfig
{
	protected ?string $intentId = null;
	protected ?string $authorizationId = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setIntentId($data['intent_id'] ?? null)
			->setAuthorizationId($data['authorization_id'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'intent_id' => $this->intentId,
			'authorization_id' => $this->authorizationId,
		], fn($value) => $value !== null);
	}

	public function getIntentId(): ?string
	{
		return $this->intentId;
	}

	public function setIntentId(?string $intentId): self
	{
		$this->intentId = $intentId;
		return $this;
	}

	public function getAuthorizationId(): ?string
	{
		return $this->authorizationId;
	}

	public function setAuthorizationId(?string $authorizationId): self
	{
		$this->authorizationId = $authorizationId;
		return $this;
	}
}