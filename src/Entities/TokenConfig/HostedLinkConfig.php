<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class HostedLinkConfig
{
	protected ?string $deliveryMethod = null;
	protected ?string $completionRedirectUri = null;
	protected ?int $urlLifetimeSeconds = null;
	protected ?bool $isMobileApp = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setDeliveryMethod($data['delivery_method'] ?? null)
			->setCompletionRedirectUri($data['completion_redirect_uri'] ?? null)
			->setUrlLifetimeSeconds($data['url_lifetime_seconds'] ?? null)
			->setIsMobileApp($data['is_mobile_app'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'delivery_method' => $this->deliveryMethod,
			'completion_redirect_uri' => $this->completionRedirectUri,
			'url_lifetime_seconds' => $this->urlLifetimeSeconds,
			'is_mobile_app' => $this->isMobileApp,
		], fn($value) => $value !== null);
	}

	public function getDeliveryMethod(): ?string
	{
		return $this->deliveryMethod;
	}

	public function setDeliveryMethod(?string $deliveryMethod): self
	{
		$this->deliveryMethod = $deliveryMethod;
		return $this;
	}

	public function getCompletionRedirectUri(): ?string
	{
		return $this->completionRedirectUri;
	}

	public function setCompletionRedirectUri(?string $completionRedirectUri): self
	{
		$this->completionRedirectUri = $completionRedirectUri;
		return $this;
	}

	public function getUrlLifetimeSeconds(): ?int
	{
		return $this->urlLifetimeSeconds;
	}

	public function setUrlLifetimeSeconds(?int $urlLifetimeSeconds): self
	{
		$this->urlLifetimeSeconds = $urlLifetimeSeconds;
		return $this;
	}

	public function getIsMobileApp(): ?bool
	{
		return $this->isMobileApp;
	}

	public function setIsMobileApp(?bool $isMobileApp): self
	{
		$this->isMobileApp = $isMobileApp;
		return $this;
	}
}