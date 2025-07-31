<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class PayrollIncomeConfig
{
	protected ?array $flowTypes = null;
	protected ?bool $isUpdateMode = null;
	protected ?string $itemIdToUpdate = null;
	protected ?array $parsingConfig = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setFlowTypes($data['flow_types'] ?? null)
			->setIsUpdateMode($data['is_update_mode'] ?? null)
			->setItemIdToUpdate($data['item_id_to_update'] ?? null)
			->setParsingConfig($data['parsing_config'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'flow_types' => $this->flowTypes,
			'is_update_mode' => $this->isUpdateMode,
			'item_id_to_update' => $this->itemIdToUpdate,
			'parsing_config' => $this->parsingConfig,
		], fn($value) => $value !== null);
	}

	public function getFlowTypes(): ?array
	{
		return $this->flowTypes;
	}

	public function setFlowTypes(?array $flowTypes): self
	{
		$this->flowTypes = $flowTypes;
		return $this;
	}

	public function getIsUpdateMode(): ?bool
	{
		return $this->isUpdateMode;
	}

	public function setIsUpdateMode(?bool $isUpdateMode): self
	{
		$this->isUpdateMode = $isUpdateMode;
		return $this;
	}

	public function getItemIdToUpdate(): ?string
	{
		return $this->itemIdToUpdate;
	}

	public function setItemIdToUpdate(?string $itemIdToUpdate): self
	{
		$this->itemIdToUpdate = $itemIdToUpdate;
		return $this;
	}

	public function getParsingConfig(): ?array
	{
		return $this->parsingConfig;
	}

	public function setParsingConfig(?array $parsingConfig): self
	{
		$this->parsingConfig = $parsingConfig;
		return $this;
	}
}