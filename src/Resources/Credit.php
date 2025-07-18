<?php

namespace TomorrowIdeas\Plaid\Resources;

class Credit extends AbstractResource
{

	public function getPayrollIncome(string $user_token, ?array $item_ids = null) : object {
		return $this->sendRequest(
			"post",
			"credit/payroll_income/get",
			$this->paramsWithClientCredentials([
				'user_token' => $user_token,
				'options' => $item_ids ? ['item_ids' => $item_ids] : null
			])
		);
	}

	public function refreshPayrollIncome(string $user_token, ?string $webhook = null, ?array $item_ids = null) : object {
		return $this->sendRequest(
			"post",
			"credit/payroll_income/refresh",
			$this->paramsWithClientCredentials([
				'user_token' => $user_token,
				'options' => $webhook || $item_ids ? array_filter([
					'webhook' => $webhook,
					'item_ids' => $item_ids
				]) : null,
			])
		);
	}

	public function getEmployment(string $user_token) : object {
		return $this->sendRequest(
			"post",
			"credit/employment/get",
			$this->paramsWithClientCredentials(['user_token' => $user_token])
		);
	}

}