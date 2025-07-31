<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class IdentityVerificationConfig
{
	protected ?string $templateId = null;
	protected ?bool $gaveConsent = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setTemplateId($data['template_id'] ?? null)
			->setGaveConsent($data['gave_consent'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'template_id' => $this->templateId,
			'gave_consent' => $this->gaveConsent,
		], fn($value) => $value !== null);
	}

	public function getTemplateId(): ?string
	{
		return $this->templateId;
	}

	public function setTemplateId(?string $templateId): self
	{
		$this->templateId = $templateId;
		return $this;
	}

	public function getGaveConsent(): ?bool
	{
		return $this->gaveConsent;
	}

	public function setGaveConsent(?bool $gaveConsent): self
	{
		$this->gaveConsent = $gaveConsent;
		return $this;
	}
}