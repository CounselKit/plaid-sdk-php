<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class UpdateConfig
{
	protected ?bool $accountSelectionEnabled = null;
	protected ?bool $reauthorizationEnabled = null;
	protected ?bool $user = null;
	protected ?array $itemIds = null;

	public static function createFromArray(array $data): self
	{
		return (new self())->setAccountSelectionEnabled($data['account_selection_enabled'] ?? null)
			->setReauthorizationEnabled($data['reauthorization_enabled'] ?? null)
			->setItemIds($data['item_ids'] ?? null)
			->setUser($data['user'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'account_selection_enabled' => $this->accountSelectionEnabled,
			'reauthorization_enabled' => $this->reauthorizationEnabled,
			'user' => $this->user,
			'item_ids' => $this->itemIds,
		], fn($value) => $value !== null);
	}

	public function getAccountSelectionEnabled(): ?bool
	{
		return $this->accountSelectionEnabled;
	}

	public function setAccountSelectionEnabled(?bool $accountSelectionEnabled): self
	{
		$this->accountSelectionEnabled = $accountSelectionEnabled;
		return $this;
	}

	public function getReauthorizationEnabled(): ?bool
	{
		return $this->reauthorizationEnabled;
	}

	public function setReauthorizationEnabled(?bool $reauthorizationEnabled): self
	{
		$this->reauthorizationEnabled = $reauthorizationEnabled;
		return $this;
	}

	public function getUser(): ?bool
	{
		return $this->user;
	}

	public function setUser(?bool $user): self
	{
		$this->user = $user;
		return $this;
	}

	public function getItemIds(): ?array
	{
		return $this->itemIds;
	}

	public function setItemIds(?array $itemIds): self
	{
		$this->itemIds = $itemIds;
		return $this;
	}
}