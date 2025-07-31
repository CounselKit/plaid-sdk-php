<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class AuthConfig
{
	protected ?bool $authTypeSelectEnabled = null;
	protected ?bool $automatedMicrodepositsEnabled = null;
	protected ?bool $instantMatchEnabled = null;
	protected ?bool $sameDayMicrodepositsEnabled = null;
	protected ?bool $instantMicrodepositsEnabled = null;
	protected ?string $rerouteToCredentials = null;
	protected ?bool $databaseMatchEnabled = null;
	protected ?bool $databaseInsightsEnabled = null;
	protected ?string $flowType = null;
	protected ?bool $smsMicrodepositsVerificationEnabled = null;

	public static function createFromArray(array $data): self
	{
		return (new self())
			->setAuthTypeSelectEnabled($data['auth_type_select_enabled'] ?? null)
			->setAutomatedMicrodepositsEnabled($data['automated_microdeposits_enabled'] ?? null)
			->setInstantMatchEnabled($data['instant_match_enabled'] ?? null)
			->setSameDayMicrodepositsEnabled($data['same_day_microdeposits_enabled'] ?? null)
			->setInstantMicrodepositsEnabled($data['instant_microdeposits_enabled'] ?? null)
			->setRerouteToCredentials($data['reroute_to_credentials'] ?? null)
			->setDatabaseMatchEnabled($data['database_match_enabled'] ?? null)
			->setDatabaseInsightsEnabled($data['database_insights_enabled'] ?? null)
			->setFlowType($data['flow_type'] ?? null)
			->setSmsMicrodepositsVerificationEnabled($data['sms_microdeposits_verification_enabled'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'auth_type_select_enabled' => $this->authTypeSelectEnabled,
			'automated_microdeposits_enabled' => $this->automatedMicrodepositsEnabled,
			'instant_match_enabled' => $this->instantMatchEnabled,
			'same_day_microdeposits_enabled' => $this->sameDayMicrodepositsEnabled,
			'instant_microdeposits_enabled' => $this->instantMicrodepositsEnabled,
			'reroute_to_credentials' => $this->rerouteToCredentials,
			'database_match_enabled' => $this->databaseMatchEnabled,
			'database_insights_enabled' => $this->databaseInsightsEnabled,
			'flow_type' => $this->flowType,
			'sms_microdeposits_verification_enabled' => $this->smsMicrodepositsVerificationEnabled,
		], fn($value) => $value !== null);
	}

	public function getAuthTypeSelectEnabled(): ?bool
	{
		return $this->authTypeSelectEnabled;
	}

	public function setAuthTypeSelectEnabled(?bool $authTypeSelectEnabled): self
	{
		$this->authTypeSelectEnabled = $authTypeSelectEnabled;
		return $this;
	}

	public function getAutomatedMicrodepositsEnabled(): ?bool
	{
		return $this->automatedMicrodepositsEnabled;
	}

	public function setAutomatedMicrodepositsEnabled(?bool $automatedMicrodepositsEnabled): self
	{
		$this->automatedMicrodepositsEnabled = $automatedMicrodepositsEnabled;
		return $this;
	}

	public function getInstantMatchEnabled(): ?bool
	{
		return $this->instantMatchEnabled;
	}

	public function setInstantMatchEnabled(?bool $instantMatchEnabled): self
	{
		$this->instantMatchEnabled = $instantMatchEnabled;
		return $this;
	}

	public function getSameDayMicrodepositsEnabled(): ?bool
	{
		return $this->sameDayMicrodepositsEnabled;
	}

	public function setSameDayMicrodepositsEnabled(?bool $sameDayMicrodepositsEnabled): self
	{
		$this->sameDayMicrodepositsEnabled = $sameDayMicrodepositsEnabled;
		return $this;
	}

	public function getInstantMicrodepositsEnabled(): ?bool
	{
		return $this->instantMicrodepositsEnabled;
	}

	public function setInstantMicrodepositsEnabled(?bool $instantMicrodepositsEnabled): self
	{
		$this->instantMicrodepositsEnabled = $instantMicrodepositsEnabled;
		return $this;
	}

	public function getRerouteToCredentials(): ?string
	{
		return $this->rerouteToCredentials;
	}

	public function setRerouteToCredentials(?string $rerouteToCredentials): self
	{
		$this->rerouteToCredentials = $rerouteToCredentials;
		return $this;
	}

	public function getDatabaseMatchEnabled(): ?bool
	{
		return $this->databaseMatchEnabled;
	}

	public function setDatabaseMatchEnabled(?bool $databaseMatchEnabled): self
	{
		$this->databaseMatchEnabled = $databaseMatchEnabled;
		return $this;
	}

	public function getDatabaseInsightsEnabled(): ?bool
	{
		return $this->databaseInsightsEnabled;
	}

	public function setDatabaseInsightsEnabled(?bool $databaseInsightsEnabled): self
	{
		$this->databaseInsightsEnabled = $databaseInsightsEnabled;
		return $this;
	}

	public function getFlowType(): ?string
	{
		return $this->flowType;
	}

	public function setFlowType(?string $flowType): self
	{
		$this->flowType = $flowType;
		return $this;
	}

	public function getSmsMicrodepositsVerificationEnabled(): ?bool
	{
		return $this->smsMicrodepositsVerificationEnabled;
	}

	public function setSmsMicrodepositsVerificationEnabled(?bool $smsMicrodepositsVerificationEnabled): self
	{
		$this->smsMicrodepositsVerificationEnabled = $smsMicrodepositsVerificationEnabled;
		return $this;
	}
}