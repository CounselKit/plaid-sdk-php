<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class InvestmentsAuthConfig
{
	protected ?bool $manualEntryEnabled = null;
	protected ?bool $maskedNumberMatchEnabled = null;
	protected ?bool $statedAccountNumberEnabled = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setManualEntryEnabled($data['manual_entry_enabled'] ?? null)
			->setMaskedNumberMatchEnabled($data['masked_number_match_enabled'] ?? null)
			->setStatedAccountNumberEnabled($data['stated_account_number_enabled'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'manual_entry_enabled' => $this->manualEntryEnabled,
			'masked_number_match_enabled' => $this->maskedNumberMatchEnabled,
			'stated_account_number_enabled' => $this->statedAccountNumberEnabled,
		], fn($value) => $value !== null);
	}

	public function getManualEntryEnabled(): ?bool
	{
		return $this->manualEntryEnabled;
	}

	public function setManualEntryEnabled(?bool $manualEntryEnabled): self
	{
		$this->manualEntryEnabled = $manualEntryEnabled;
		return $this;
	}

	public function getMaskedNumberMatchEnabled(): ?bool
	{
		return $this->maskedNumberMatchEnabled;
	}

	public function setMaskedNumberMatchEnabled(?bool $maskedNumberMatchEnabled): self
	{
		$this->maskedNumberMatchEnabled = $maskedNumberMatchEnabled;
		return $this;
	}

	public function getStatedAccountNumberEnabled(): ?bool
	{
		return $this->statedAccountNumberEnabled;
	}

	public function setStatedAccountNumberEnabled(?bool $statedAccountNumberEnabled): self
	{
		$this->statedAccountNumberEnabled = $statedAccountNumberEnabled;
		return $this;
	}
}