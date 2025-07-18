<?php

namespace TomorrowIdeas\Plaid\Entities;

class IdentityAddress
{

	/**
	 * Street address.
	 *
	 * @var string
	 */
	protected $street;

	/**
	 * City
	 *
	 * @var string
	 */
	protected $city;

	/**
	 * The region or state.
	 *
	 * @var string
	 */
	protected $region;

	/**
	 * Postal code
	 *
	 * @var string
	 */
	protected $postal_code;

	/**
	 * Country (2 character ISO)
	 *
	 * @var string
	 */
	protected $country;

	/**
	 * Address constructor.
	 *
	 * The Address object is needed for certain requests to Plaid.
	 *
	 * @param string $street
	 * @param string $city
	 * @param string $region
	 * @param string $postal_code
	 * @param string $country
	 */
	public function __construct(
		string $street,
		string $city,
		string $region,
		string $postal_code,
		string $country)
	{
		$this->street = $street;
		$this->city = $city;
		$this->region = $region;
		$this->postal_code = $postal_code;
		$this->country = $country;
	}

	/**
	 * Convert the object into a key=>value pair that can be used in HTTP requests.
	 *
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			"street" => $this->street,
			"city" => $this->city,
			"region" => $this->region,
			"postal_code" => $this->postal_code,
			"country" => $this->country
		];
	}
}