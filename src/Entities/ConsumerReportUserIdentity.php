<?php

namespace TomorrowIdeas\Plaid\Entities;

class ConsumerReportUserIdentity
{

	/**
	 * The first name.
	 *
	 * @var string
	 */
	protected $first_name;

	/**
	 * The last name.
	 *
	 * @var string
	 */
	protected $last_name;

	/**
	 * Phone numbers, in E164 format.
	 *
	 * @var string[]
	 */
	protected $phone_numbers = [];

	/**
	 * The emails.
	 *
	 * @var string[]
	 */
	protected $emails;

	/**
	 * The ssn last 4.
	 *
	 * @var string|null
	 */
	protected $ssn_last_4;

	/**
	 * The date of birth.
	 *
	 * @var string|null
	 */
	protected $date_of_birth;

	/**
	 * The primary address of the user.
	 *
	 * @var IdentityAddress|null
	 */
	protected $primary_address;

	/**
	 * Construct a Consumer Report User Identity.
	 *
	 * @param string $first_name
	 * @param string $last_name
	 * @param array $phone_numbers
	 * @param array $emails
	 * @param string|null $ssn_last_4
	 * @param string|null $date_of_birth
	 * @param IdentityAddress|null $primary_address
	 */
	public function __construct(
		string $first_name,
		string $last_name,
		array $phone_numbers = [],
		array $emails = [],
		?string $ssn_last_4 = null,
		?string $date_of_birth = null,
		?IdentityAddress $primary_address = null) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->phone_numbers = $phone_numbers;
		$this->emails = $emails;
		$this->ssn_last_4 = $ssn_last_4;
		$this->date_of_birth = $date_of_birth;
		$this->primary_address = $primary_address;
	}

	public function toArray(): array
	{
		return \array_filter(
			[
				"first_name" => $this->first_name,
				"last_name" => $this->last_name,
				"phone_numbers" => $this->phone_numbers ?: null,
				"emails" => $this->emails ?: null,
				"ssn_last_4" => $this->ssn_last_4 ?: null,
				"date_of_birth" => $this->date_of_birth,
				"primary_address" => $this->primary_address ? $this->primary_address->toArray() : null
			],
			function($value): bool {
				return $value !== null;
			}
		);
	}
}