<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class InvestmentsConfig
{
	protected ?bool $allowUnverifiedCryptoWallets = null;
	protected ?bool $allowManualEntry = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setAllowUnverifiedCryptoWallets($data['allow_unverified_crypto_wallets'] ?? null)
			->setAllowManualEntry($data['allow_manual_entry'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'allow_unverified_crypto_wallets' => $this->allowUnverifiedCryptoWallets,
			'allow_manual_entry' => $this->allowManualEntry,
		], fn($value) => $value !== null);
	}

	public function getAllowUnverifiedCryptoWallets(): ?bool
	{
		return $this->allowUnverifiedCryptoWallets;
	}

	public function setAllowUnverifiedCryptoWallets(?bool $allowUnverifiedCryptoWallets): self
	{
		$this->allowUnverifiedCryptoWallets = $allowUnverifiedCryptoWallets;
		return $this;
	}

	public function getAllowManualEntry(): ?bool
	{
		return $this->allowManualEntry;
	}

	public function setAllowManualEntry(?bool $allowManualEntry): self
	{
		$this->allowManualEntry = $allowManualEntry;
		return $this;
	}
}