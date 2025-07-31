<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class PaymentInitiationConfig
{
	protected ?string $paymentId = null;
	protected ?string $consentId = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setPaymentId($data['payment_id'] ?? null)
			->setConsentId($data['consent_id'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'payment_id' => $this->paymentId,
			'consent_id' => $this->consentId,
		], fn($value) => $value !== null);
	}

	public function getPaymentId(): ?string
	{
		return $this->paymentId;
	}

	public function setPaymentId(?string $paymentId): self
	{
		$this->paymentId = $paymentId;
		return $this;
	}

	public function getConsentId(): ?string
	{
		return $this->consentId;
	}

	public function setConsentId(?string $consentId): self
	{
		$this->consentId = $consentId;
		return $this;
	}
}