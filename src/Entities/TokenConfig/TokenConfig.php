<?php
namespace TomorrowIdeas\Plaid\Entities\TokenConfig;

use TomorrowIdeas\Plaid\Entities\User;

class TokenConfig
{
	protected string $clientName;
	protected string $language;
	protected array $countryCodes;
	protected ?User $user = null;
	protected ?array $products = null;
	protected ?array $requiredIfSupportedProducts = null;
	protected ?array $optionalProducts = null;
	protected ?array $additionalConsentedProducts = null;
	protected ?string $webhook = null;
	protected ?string $accessToken = null;
	protected ?string $linkCustomizationName = null;
	protected ?string $redirectUri = null;
	protected ?string $androidPackageName = null;
	protected ?InstitutionDataConfig $institutionData = null;
	protected ?AccountFilters $accountFilters = null;
	protected ?string $institutionId = null;
	protected ?PaymentInitiationConfig $paymentInitiation = null;
	protected ?IncomeVerificationConfig $incomeVerification = null;
	protected ?CraOptionsConfig $craOptions = null;
	protected ?string $consumerReportPermissiblePurpose = null;
	protected ?AuthConfig $auth = null;
	protected ?TransferConfig $transfer = null;
	protected ?UpdateConfig $update = null;
	protected ?IdentityVerificationConfig $identityVerification = null;
	protected ?StatementsConfig $statements = null;
	protected ?string $userToken = null;
	protected ?InvestmentsConfig $investments = null;
	protected ?InvestmentsAuthConfig $investmentsAuth = null;
	protected ?HostedLinkConfig $hostedLink = null;
	protected ?TransactionsConfig $transactions = null;
	protected ?IdentityConfig $identity = null;
	protected ?bool $enableMultiItemLink = null;

	protected ?string $userId = null;

	public function __construct(string $clientName, string $language, array $countryCodes)
	{
		$this->clientName = $clientName;
		$this->language = $language;
		$this->countryCodes = $countryCodes;
	}

	public static function createFromArray(array $data): self
	{
		$config = new self(
			$data['client_name'] ?? '',
			$data['language'] ?? '',
			$data['country_codes'] ?? []
		);

		if (isset($data['user'])) {
			$config->setUser(User::createFromArray($data['user']));
		}

		if (isset($data['institution_data'])) {
			$config->setInstitutionData(InstitutionDataConfig::createFromArray($data['institution_data']));
		}

		if (isset($data['account_filters'])) {
			$config->setAccountFilters(AccountFilters::createFromArray($data['account_filters']));
		}

		if (isset($data['payment_initiation'])) {
			$config->setPaymentInitiation(PaymentInitiationConfig::createFromArray($data['payment_initiation']));
		}

		if (isset($data['income_verification'])) {
			$config->setIncomeVerification(IncomeVerificationConfig::createFromArray($data['income_verification']));
		}

		if (isset($data['cra_options'])) {
			$config->setCraOptions(CraOptionsConfig::createFromArray($data['cra_options']));
		}

		if (isset($data['auth'])) {
			$config->setAuth(AuthConfig::createFromArray($data['auth']));
		}

		if (isset($data['transfer'])) {
			$config->setTransfer(TransferConfig::createFromArray($data['transfer']));
		}

		if (isset($data['update'])) {
			$config->setUpdate(UpdateConfig::createFromArray($data['update']));
		}

		if (isset($data['identity_verification'])) {
			$config->setIdentityVerification(IdentityVerificationConfig::createFromArray($data['identity_verification']));
		}

		if (isset($data['statements'])) {
			$config->setStatements(StatementsConfig::createFromArray($data['statements']));
		}

		if (isset($data['investments'])) {
			$config->setInvestments(InvestmentsConfig::createFromArray($data['investments']));
		}

		if (isset($data['investments_auth'])) {
			$config->setInvestmentsAuth(InvestmentsAuthConfig::createFromArray($data['investments_auth']));
		}

		if (isset($data['hosted_link'])) {
			$config->setHostedLink(HostedLinkConfig::createFromArray($data['hosted_link']));
		}

		if (isset($data['transactions'])) {
			$config->setTransactions(TransactionsConfig::createFromArray($data['transactions']));
		}

		if (isset($data['identity'])) {
			$config->setIdentity(IdentityConfig::createFromArray($data['identity']));
		}

		return $config->setProducts($data['products'] ?? null)
			->setRequiredIfSupportedProducts($data['required_if_supported_products'] ?? null)
			->setOptionalProducts($data['optional_products'] ?? null)
			->setAdditionalConsentedProducts($data['additional_consented_products'] ?? null)
			->setWebhook($data['webhook'] ?? null)
			->setAccessToken($data['access_token'] ?? null)
			->setLinkCustomizationName($data['link_customization_name'] ?? null)
			->setRedirectUri($data['redirect_uri'] ?? null)
			->setAndroidPackageName($data['android_package_name'] ?? null)
			->setInstitutionId($data['institution_id'] ?? null)
			->setConsumerReportPermissiblePurpose($data['consumer_report_permissible_purpose'] ?? null)
			->setUserToken($data['user_token'] ?? null)
			->setEnableMultiItemLink($data['enable_multi_item_link'] ?? null)
			->setUserId($data['user_id'] ?? null);
	}

	public function toArray(): array
	{
		return array_filter([
			'client_name' => $this->clientName,
			'language' => $this->language,
			'country_codes' => $this->countryCodes,
			'user' => $this->user ? $this->user->toArray() : null,
			'products' => $this->products,
			'required_if_supported_products' => $this->requiredIfSupportedProducts,
			'optional_products' => $this->optionalProducts,
			'additional_consented_products' => $this->additionalConsentedProducts,
			'webhook' => $this->webhook,
			'access_token' => $this->accessToken,
			'link_customization_name' => $this->linkCustomizationName,
			'redirect_uri' => $this->redirectUri,
			'android_package_name' => $this->androidPackageName,
			'institution_data' => $this->institutionData ? $this->institutionData->toArray() : null,
			'account_filters' => $this->accountFilters ? $this->accountFilters->toArray() : null,
			'institution_id' => $this->institutionId,
			'payment_initiation' => $this->paymentInitiation ? $this->paymentInitiation->toArray() : null,
			'income_verification' => $this->incomeVerification ? $this->incomeVerification->toArray() : null,
			'cra_options' => $this->craOptions ? $this->craOptions->toArray() : null,
			'consumer_report_permissible_purpose' => $this->consumerReportPermissiblePurpose,
			'auth' => $this->auth ? $this->auth->toArray() : null,
			'transfer' => $this->transfer ? $this->transfer->toArray() : null,
			'update' => $this->update ? $this->update->toArray() : null,
			'identity_verification' => $this->identityVerification ? $this->identityVerification->toArray() : null,
			'statements' => $this->statements ? $this->statements->toArray() : null,
			'user_token' => $this->userToken,
			'investments' => $this->investments ? $this->investments->toArray() : null,
			'investments_auth' => $this->investmentsAuth ? $this->investmentsAuth->toArray() : null,
			'hosted_link' => $this->hostedLink ? $this->hostedLink->toArray() : null,
			'transactions' => $this->transactions ? $this->transactions->toArray() : null,
			'identity' => $this->identity ? $this->identity->toArray() : null,
			'enable_multi_item_link' => $this->enableMultiItemLink,
			'user_id' => $this->userId,
		], fn($value) => $value !== null);
	}

	public function getClientName(): string
	{
		return $this->clientName;
	}

	public function setClientName(string $clientName): self
	{
		$this->clientName = $clientName;
		return $this;
	}

	public function getLanguage(): string
	{
		return $this->language;
	}

	public function setLanguage(string $language): self
	{
		$this->language = $language;
		return $this;
	}

	public function getCountryCodes(): array
	{
		return $this->countryCodes;
	}

	public function setCountryCodes(array $countryCodes): self
	{
		$this->countryCodes = $countryCodes;
		return $this;
	}

	public function getUser(): ?User
	{
		return $this->user;
	}

	public function setUser(?User $user): self
	{
		$this->user = $user;
		return $this;
	}

	public function getProducts(): ?array
	{
		return $this->products;
	}

	public function setProducts(?array $products): self
	{
		$this->products = $products;
		return $this;
	}

	public function getRequiredIfSupportedProducts(): ?array
	{
		return $this->requiredIfSupportedProducts;
	}

	public function setRequiredIfSupportedProducts(?array $requiredIfSupportedProducts): self
	{
		$this->requiredIfSupportedProducts = $requiredIfSupportedProducts;
		return $this;
	}

	public function getOptionalProducts(): ?array
	{
		return $this->optionalProducts;
	}

	public function setOptionalProducts(?array $optionalProducts): self
	{
		$this->optionalProducts = $optionalProducts;
		return $this;
	}

	public function getAdditionalConsentedProducts(): ?array
	{
		return $this->additionalConsentedProducts;
	}

	public function setAdditionalConsentedProducts(?array $additionalConsentedProducts): self
	{
		$this->additionalConsentedProducts = $additionalConsentedProducts;
		return $this;
	}

	public function getWebhook(): ?string
	{
		return $this->webhook;
	}

	public function setWebhook(?string $webhook): self
	{
		$this->webhook = $webhook;
		return $this;
	}

	public function getAccessToken(): ?string
	{
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken): self
	{
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getLinkCustomizationName(): ?string
	{
		return $this->linkCustomizationName;
	}

	public function setLinkCustomizationName(?string $linkCustomizationName): self
	{
		$this->linkCustomizationName = $linkCustomizationName;
		return $this;
	}

	public function getRedirectUri(): ?string
	{
		return $this->redirectUri;
	}

	public function setRedirectUri(?string $redirectUri): self
	{
		$this->redirectUri = $redirectUri;
		return $this;
	}

	public function getAndroidPackageName(): ?string
	{
		return $this->androidPackageName;
	}

	public function setAndroidPackageName(?string $androidPackageName): self
	{
		$this->androidPackageName = $androidPackageName;
		return $this;
	}

	public function getInstitutionData(): ?InstitutionDataConfig
	{
		return $this->institutionData;
	}

	public function setInstitutionData(?InstitutionDataConfig $institutionData): self
	{
		$this->institutionData = $institutionData;
		return $this;
	}

	public function getAccountFilters(): ?AccountFilters
	{
		return $this->accountFilters;
	}

	public function setAccountFilters(?AccountFilters $accountFilters): self
	{
		$this->accountFilters = $accountFilters;
		return $this;
	}

	public function getInstitutionId(): ?string
	{
		return $this->institutionId;
	}

	public function setInstitutionId(?string $institutionId): self
	{
		$this->institutionId = $institutionId;
		return $this;
	}

	public function getPaymentInitiation(): ?PaymentInitiationConfig
	{
		return $this->paymentInitiation;
	}

	public function setPaymentInitiation(?PaymentInitiationConfig $paymentInitiation): self
	{
		$this->paymentInitiation = $paymentInitiation;
		return $this;
	}

	public function getIncomeVerification(): ?IncomeVerificationConfig
	{
		return $this->incomeVerification;
	}

	public function setIncomeVerification(?IncomeVerificationConfig $incomeVerification): self
	{
		$this->incomeVerification = $incomeVerification;
		return $this;
	}

	public function getCraOptions(): ?CraOptionsConfig
	{
		return $this->craOptions;
	}

	public function setCraOptions(?CraOptionsConfig $craOptions): self
	{
		$this->craOptions = $craOptions;
		return $this;
	}

	public function getConsumerReportPermissiblePurpose(): ?string
	{
		return $this->consumerReportPermissiblePurpose;
	}

	public function setConsumerReportPermissiblePurpose(?string $consumerReportPermissiblePurpose): self
	{
		$this->consumerReportPermissiblePurpose = $consumerReportPermissiblePurpose;
		return $this;
	}

	public function getAuth(): ?AuthConfig
	{
		return $this->auth;
	}

	public function setAuth(?AuthConfig $auth): self
	{
		$this->auth = $auth;
		return $this;
	}

	public function getTransfer(): ?TransferConfig
	{
		return $this->transfer;
	}

	public function setTransfer(?TransferConfig $transfer): self
	{
		$this->transfer = $transfer;
		return $this;
	}

	public function getUpdate(): ?UpdateConfig
	{
		return $this->update;
	}

	public function setUpdate(?UpdateConfig $update): self
	{
		$this->update = $update;
		return $this;
	}

	public function getIdentityVerification(): ?IdentityVerificationConfig
	{
		return $this->identityVerification;
	}

	public function setIdentityVerification(?IdentityVerificationConfig $identityVerification): self
	{
		$this->identityVerification = $identityVerification;
		return $this;
	}

	public function getStatements(): ?StatementsConfig
	{
		return $this->statements;
	}

	public function setStatements(?StatementsConfig $statements): self
	{
		$this->statements = $statements;
		return $this;
	}

	public function getUserToken(): ?string
	{
		return $this->userToken;
	}

	public function setUserToken(?string $userToken): self
	{
		$this->userToken = $userToken;
		return $this;
	}

	public function getInvestments(): ?InvestmentsConfig
	{
		return $this->investments;
	}

	public function setInvestments(?InvestmentsConfig $investments): self
	{
		$this->investments = $investments;
		return $this;
	}

	public function getInvestmentsAuth(): ?InvestmentsAuthConfig
	{
		return $this->investmentsAuth;
	}

	public function setInvestmentsAuth(?InvestmentsAuthConfig $investmentsAuth): self
	{
		$this->investmentsAuth = $investmentsAuth;
		return $this;
	}

	public function getHostedLink(): ?HostedLinkConfig
	{
		return $this->hostedLink;
	}

	public function setHostedLink(?HostedLinkConfig $hostedLink): self
	{
		$this->hostedLink = $hostedLink;
		return $this;
	}

	public function getTransactions(): ?TransactionsConfig
	{
		return $this->transactions;
	}

	public function setTransactions(?TransactionsConfig $transactions): self
	{
		$this->transactions = $transactions;
		return $this;
	}

	public function getIdentity(): ?IdentityConfig
	{
		return $this->identity;
	}

	public function setIdentity(?IdentityConfig $identity): self
	{
		$this->identity = $identity;
		return $this;
	}

	public function getEnableMultiItemLink(): ?bool
	{
		return $this->enableMultiItemLink;
	}

	public function setEnableMultiItemLink(?bool $enableMultiItemLink): self
	{
		$this->enableMultiItemLink = $enableMultiItemLink;
		return $this;
	}

	public function getUserId(): ?string
	{
		return $this->userId;
	}

	public function setUserId(?string $userId): self
	{
		$this->userId = $userId;
		return $this;
	}
}