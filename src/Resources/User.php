<?php

namespace TomorrowIdeas\Plaid\Resources;

use TomorrowIdeas\Plaid\Entities\ConsumerReportUserIdentity;
use TomorrowIdeas\Plaid\Entities\Item;

class User extends AbstractResource
{

	public function create(string $client_user_id, ?ConsumerReportUserIdentity $consumer_report_user_identity = null) : object {
		return $this->sendRequest(
			"post",
			"user/create",
			$this->paramsWithClientCredentials(array_filter([
				'client_user_id' => $client_user_id,
				'consumer_report_user_identity' => $consumer_report_user_identity ? $consumer_report_user_identity->toArray() : null
			]))
		);
	}

	public function update(string $user_token, ?ConsumerReportUserIdentity $consumer_report_user_identity = null) : object {
		return $this->sendRequest(
			"post",
			"user/update",
			$this->paramsWithClientCredentials(array_filter([
				'user_token' => $user_token,
				'consumer_report_user_identity' => $consumer_report_user_identity ? $consumer_report_user_identity->toArray() : null
			]))
		);
	}

	/**
	 * Get the users items.
	 *
	 * @param string $user_token
	 *   The user token of the user to retrieve items from.
	 *
	 * @return Item[]
	 *
	 * @throws \TomorrowIdeas\Plaid\PlaidRequestException
	 */
	public function getItems(string $user_token) : array {
		$response = $this->sendRequest(
			"post",
			"user/remove",
			$this->paramsWithClientCredentials([
				'user_token' => $user_token
			])
		);

		return array_map(
			function($item_array) { return Item::fromArray($item_array); },
			$response->items ?? []
		);
	}



}