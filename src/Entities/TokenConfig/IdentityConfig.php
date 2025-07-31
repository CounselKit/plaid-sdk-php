<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class IdentityConfig
{
	protected ?bool $isDocumentUpload = null;
	protected ?array $accountIds = null;
	protected ?array $parsingConfigs = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setIsDocumentUpload($data['is_document_upload'] ?? null)
			->setAccountIds($data['account_ids'] ?? null)
			->setParsingConfigs($data['parsing_configs'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'is_document_upload' => $this->isDocumentUpload,
			'account_ids' => $this->accountIds,
			'parsing_configs' => $this->parsingConfigs,
		], fn($value) => $value !== null);
	}

	public function getIsDocumentUpload(): ?bool
	{
		return $this->isDocumentUpload;
	}

	public function setIsDocumentUpload(?bool $isDocumentUpload): self
	{
		$this->isDocumentUpload = $isDocumentUpload;
		return $this;
	}

	public function getAccountIds(): ?array
	{
		return $this->accountIds;
	}

	public function setAccountIds(?array $accountIds): self
	{
		$this->accountIds = $accountIds;
		return $this;
	}

	public function getParsingConfigs(): ?array
	{
		return $this->parsingConfigs;
	}

	public function setParsingConfigs(?array $parsingConfigs): self
	{
		$this->parsingConfigs = $parsingConfigs;
		return $this;
	}
}