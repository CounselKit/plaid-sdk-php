<?php

namespace TomorrowIdeas\Plaid\Entities;

/**
 * Representation of an item.
 *
 * @see https://plaid.com/docs/api/items/#itemget
 */
class Item
{

	/**
	 * The item id.
	 *
	 * @var string
	 */
	protected $item_id;

	/**
	 * The institution id.
	 *
	 * @var string
	 */
	protected $institution_id;

	/**
	 * The institution name.
	 *
	 * @var string
	 */
	protected $institution_name;

	/**
	 * The webhook url.
	 *
	 * @var string
	 */
	protected $webhook;

	/**
	 * The auth method.
	 *
	 * @var string
	 */
	protected $auth_method;

	protected $error;

	protected $available_products;

	protected $billed_products;

	protected $products;

	protected $consented_products;

	protected $consent_expiration_time;

	protected $update_type;

	protected $created_at;

	protected $consented_use_cases;

	protected $consented_data_scopes;

	public static function fromArray(array $array) {
		return new static(
			$array['item_id'],
			$array['institution_id'] ?? null,
			$array['institution_name'] ?? null,
			$array['webhook'] ?? null,
			$array['auth_method'] ?? null,
			$array['error'] ?? null,
			$array['available_products'] ?? [],
			$array['billed_products'] ?? [],
			$array['products'] ?? [],
			$array['consented_products'] ?? [],
			$array['consent_expiration_time'] ?? null,
			$array['update_type'] ?? null,
			$array['created_at'] ?? null,
			$array['consented_use_cases'] ?? [],
			$array['consented_data_scopes'] ?? []
		);
	}

	public function __construct(
		string $item_id,
		?string $institution_id = null,
		?string $institution_name = null,
		?string $webhook = null,
		?string $auth_method = null,
		?object $error = null, // @todo: Create an error entity?
		array $available_products = [],
		array $billed_products = [],
		array $products = [],
		array $consented_products = [],
		?string $consent_expiration_time = null,
		?string $update_type = null,
		?string $created_at = null,
		array $consented_use_cases = [],
		array $consented_data_scopes = []
	) {
		$this->item_id = $item_id;
		$this->institution_id = $institution_id;
		$this->institution_name = $institution_name;
		$this->webhook = $webhook;
		$this->auth_method = $auth_method;
		$this->error = $error;
		$this->available_products = $available_products;
		$this->billed_products = $billed_products;
		$this->products = $products;
		$this->consented_products = $consented_products;
		$this->consent_expiration_time = $consent_expiration_time;
		$this->update_type = $update_type;
		$this->created_at = $created_at;
		$this->consented_use_cases = $consented_use_cases;
		$this->consented_data_scopes = $consented_data_scopes;
	}

}