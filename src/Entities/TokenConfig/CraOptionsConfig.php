<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class CraOptionsConfig
{
	protected ?int $daysRequested = null;
	protected ?int $daysRequired = null;
	protected ?string $clientReportId = null;
	protected ?bool $partnerInsights = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setDaysRequested($data['days_requested'] ?? null)
			->setDaysRequired($data['days_required'] ?? null)
			->setClientReportId($data['client_report_id'] ?? null)
			->setPartnerInsights($data['partner_insights'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'days_requested' => $this->daysRequested,
			'days_required' => $this->daysRequired,
			'client_report_id' => $this->clientReportId,
			'partner_insights' => $this->partnerInsights,
		], fn($value) => $value !== null);
	}

	public function getDaysRequested(): ?int
	{
		return $this->daysRequested;
	}

	public function setDaysRequested(?int $daysRequested): self
	{
		$this->daysRequested = $daysRequested;
		return $this;
	}

	public function getDaysRequired(): ?int
	{
		return $this->daysRequired;
	}

	public function setDaysRequired(?int $daysRequired): self
	{
		$this->daysRequired = $daysRequired;
		return $this;
	}

	public function getClientReportId(): ?string
	{
		return $this->clientReportId;
	}

	public function setClientReportId(?string $clientReportId): self
	{
		$this->clientReportId = $clientReportId;
		return $this;
	}

	public function getPartnerInsights(): ?bool
	{
		return $this->partnerInsights;
	}

	public function setPartnerInsights(?bool $partnerInsights): self
	{
		$this->partnerInsights = $partnerInsights;
		return $this;
	}
}