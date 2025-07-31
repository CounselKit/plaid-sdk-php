<?php

namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

class IncomeVerificationConfig
{
	protected ?string $assetReportId = null;
	protected ?array $accessTokens = null;
	protected ?array $incomeSourceTypes = null;
	protected ?BankIncomeConfig $bankIncome = null;
	protected ?PayrollIncomeConfig $payrollIncome = null;
	protected ?array $statedIncomeSources = null;

	public static function createFromArray(array $data): self
	{
		$config = new self();

		if (isset($data['bank_income'])) {
			$config->setBankIncome(BankIncomeConfig::createFromArray($data['bank_income']));
		}

		if (isset($data['payroll_income'])) {
			$config->setPayrollIncome(PayrollIncomeConfig::createFromArray($data['payroll_income']));
		}

		return $config->setAssetReportId($data['asset_report_id'] ?? null)
			->setAccessTokens($data['access_tokens'] ?? null)
			->setIncomeSourceTypes($data['income_source_types'] ?? null)
			->setStatedIncomeSources($data['stated_income_sources'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'asset_report_id' => $this->assetReportId,
			'access_tokens' => $this->accessTokens,
			'income_source_types' => $this->incomeSourceTypes,
			'bank_income' => $this->bankIncome ? $this->bankIncome->toArray() : null,
			'payroll_income' => $this->payrollIncome ? $this->payrollIncome->toArray() : null,
			'stated_income_sources' => $this->statedIncomeSources,
		], fn($value) => $value !== null);
	}

	public function getAssetReportId(): ?string
	{
		return $this->assetReportId;
	}

	public function setAssetReportId(?string $assetReportId): self
	{
		$this->assetReportId = $assetReportId;
		return $this;
	}

	public function getAccessTokens(): ?array
	{
		return $this->accessTokens;
	}

	public function setAccessTokens(?array $accessTokens): self
	{
		$this->accessTokens = $accessTokens;
		return $this;
	}

	public function getIncomeSourceTypes(): ?array
	{
		return $this->incomeSourceTypes;
	}

	public function setIncomeSourceTypes(?array $incomeSourceTypes): self
	{
		$this->incomeSourceTypes = $incomeSourceTypes;
		return $this;
	}

	public function getBankIncome(): ?BankIncomeConfig
	{
		return $this->bankIncome;
	}

	public function setBankIncome(?BankIncomeConfig $bankIncome): self
	{
		$this->bankIncome = $bankIncome;
		return $this;
	}

	public function getPayrollIncome(): ?PayrollIncomeConfig
	{
		return $this->payrollIncome;
	}

	public function setPayrollIncome(?PayrollIncomeConfig $payrollIncome): self
	{
		$this->payrollIncome = $payrollIncome;
		return $this;
	}

	public function getStatedIncomeSources(): ?array
	{
		return $this->statedIncomeSources;
	}

	public function setStatedIncomeSources(?array $statedIncomeSources): self
	{
		$this->statedIncomeSources = $statedIncomeSources;
		return $this;
	}

	public function addStatedIncomeSource(StatedIncomeSourceConfig $statedIncomeSource): self
	{
		$this->statedIncomeSources[] = $statedIncomeSource;
		return $this;
	}
}