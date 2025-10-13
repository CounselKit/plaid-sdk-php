<?php

namespace TomorrowIdeas\Plaid\Resources;

use TomorrowIdeas\Plaid\PlaidRequestException;
use TomorrowIdeas\Plaid\Resources\AbstractResource;

class Statements extends AbstractResource
{

	/**
	 * List all statements for an item.
	 *
	 * @param string $access_token
	 *
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function list(string $access_token): object
	{
		$params = [
			"access_token" => $access_token,
		];

		return $this->sendRequest(
			"post",
			"statements/list",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Download a given statement
	 *
	 * @param string $access_token
	 *
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function download(string $access_token, string $statement_id) : object {
		$params = [
			"access_token" => $access_token,
			"statement_id" => $statement_id
		];

		return $this->sendRequestRawResponse(
			"post",
			"statements/download",
			$this->paramsWithClientCredentials($params)
		)->getBody();
	}

	/**
	 * Refresh statements within a specified date range
	 *
	 * @param string $access_token The access token associated with the request
	 * @param \DateTime $start_date The start date for the statements refresh
	 * @param \DateTime $end_date The end date for the statements refresh
	 *
	 * @return object
	 */
	public function refresh(string $access_token, \DateTime $start_date, \DateTime $end_date) : object {
		$params = [
			"access_token" => $access_token,
			"start_date" => $start_date->format("Y-m-d"),
			"end_date" => $end_date->format("Y-m-d")
		];

		return $this->sendRequest(
			"post",
			"statements/refresh",
			$this->paramsWithClientCredentials($params)
		);
	}

}