<?php

namespace TomorrowIdeas\Plaid\Resources;

use TomorrowIdeas\Plaid\Entities\User;
use TomorrowIdeas\Plaid\PlaidRequestException;

class Accounts extends AbstractResource
{
	/**
	 * Get all Accounts.
	 *
	 * @param string $access_token
	 * @param array<string,mixed> $options
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function list(string $access_token, array $options = []): object
	{
		$params = [
			"access_token" => $access_token,
			"options" => (object) $options
		];

		return $this->sendRequest(
			"post",
			"accounts/get",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Get Account balance.
	 *
	 * @param string $access_token
	 * @param array<string,mixed> $options
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function getBalance(string $access_token, array $options = []): object
	{
		$params = [
			"access_token" => $access_token,
			"options" => (object) $options
		];

		return $this->sendRequest(
			"post",
			"accounts/balance/get",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Get Account identity information.
	 *
	 * @param string $access_token
	 * @param array<string,mixed> $options
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function getIdentity(string $access_token, array $options = []): object
	{
		$params = [
			"access_token" => $access_token,
			"options" => (object) $options
		];

		return $this->sendRequest(
			"post",
			"identity/get",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Match accounts to given user.
	 *
	 * @param string $access_token
	 * @param \TomorrowIdeas\Plaid\Entities\User $user
	 * @param array $options
	 *
	 * @return object
	 * @throws \TomorrowIdeas\Plaid\PlaidRequestException
	 */
	public function matchIdentity(string $access_token, User $user, array $options = []): object
	{
		$params = [
			"access_token" => $access_token,
			"user" => $user->toArray(),
			"options" => (object) $options
		];

		return $this->sendRequest(
			"post",
			"identity/match",
			$this->paramsWithClientCredentials($params)
		);
	}
}