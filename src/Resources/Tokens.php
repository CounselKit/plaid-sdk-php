<?php

namespace TomorrowIdeas\Plaid\Resources;

use TomorrowIdeas\Plaid\Entities\TokenConfig\AccountFilters;
use TomorrowIdeas\Plaid\Entities\TokenConfig\AuthConfig;
use TomorrowIdeas\Plaid\Entities\TokenConfig\PaymentInitiationConfig;
use TomorrowIdeas\Plaid\Entities\TokenConfig\TokenConfig;
use TomorrowIdeas\Plaid\Entities\User;
use TomorrowIdeas\Plaid\PlaidRequestException;

class Tokens extends AbstractResource
{
	/**
	 * Create a Link Token.
	 *
	 * @param \TomorrowIdeas\Plaid\Entities\TokenConfig\TokenConfig|string $token_config
	 *   The token config or `client_name` if using the deprecated approach.
	 * @param string $language Possible values are: en, fr, es, nl
	 * @param array<string> $country_codes Possible values are: CA, FR, IE, NL, ES, GB, US
	 * @param User $user
	 * @param array<string> $products Possible values are: transactions, auth, identity, income, assets, investments, liabilities, payment_initiation
	 * @param string|null $webhook
	 * @param string|null $link_customization_name
	 * @param AccountFilters|null $account_filters
	 * @param string|null $access_token
	 * @param string|null $redirect_uri
	 * @param string|null $android_package_name
	 * @param string|null $payment_id
	 * @param string|null $institution_id
	 * @param array|null $auth
	 *
	 * @throws PlaidRequestException
	 * @throws \InvalidArgumentException
	 *   When calling with $token_config as a string for the client name, if language and country_codes are
	 *
	 * @return object
	 */
	public function create(
		$token_config,
		?string $language = NULL,
		?array $country_codes = NULL,
		?User $user = NULL,
		array $products = [],
		?string $webhook = null,
		?string $link_customization_name = null,
		?AccountFilters $account_filters = null,
		?string $access_token = null,
		?string $redirect_uri = null,
		?string $android_package_name = null,
		?string $payment_id = null,
		?string $institution_id = null,
		?array $auth = null): object {

		if (is_string($token_config)) {
			trigger_error('Passing multiple arguments to Tokens::create() is deprecated. Please pass an instance of TomorrowIdeas\Plaid\Entities\TokenConfig\TokenConfig instead.', E_USER_DEPRECATED);

			if (empty($language) || empty($country_codes)) {
				throw new \InvalidArgumentException('You must provide a language and country code when passing a string as the first argument to Tokens::create().');
			}

			$token_config = (new TokenConfig(
					$token_config,
					$language,
					$country_codes,
				))
			    ->setUser($user)
			    ->setProducts($products)
			    ->setWebhook($webhook)
			    ->setLinkCustomizationName($link_customization_name)
			    ->setAccountFilters($account_filters)
			    ->setAccessToken($access_token)
			    ->setRedirectUri($redirect_uri)
			    ->setAndroidPackageName($android_package_name)
			    ->setInstitutionId($institution_id)
			    ->setAuth(AuthConfig::createFromArray($auth));
			if ($payment_id) {
				$token_config->setPaymentInitiation((new PaymentInitiationConfig())->setPaymentId($payment_id));;
			}
		}

		return $this->sendRequest(
			"post",
			"link/token/create",
			$this->paramsWithClientCredentials($token_config->toArray())
		);
	}

	/**
	 * Get information about a previously created Link token.
	 *
	 * @param string $link_token
	 * @throws PlaidRequestException
	 * @return object
	 */
	public function get(string $link_token): object
	{
		$params = [
			"link_token" => $link_token
		];

		return $this->sendRequest(
			"post",
			"link/token/get",
			$this->paramsWithClientCredentials($params)
		);
	}
}