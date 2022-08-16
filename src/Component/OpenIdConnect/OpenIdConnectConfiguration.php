<?php

declare(strict_types = 1);


namespace Heptacom\AdminOpenAuth\Component\OpenIdConnect;

use Shopware\Core\Framework\Struct\Struct;

class OpenIdConnectConfiguration extends Struct
{
    private bool $wellKnownDiscovered = false;

    protected ?string $issuer = null;
    protected ?string $authorization_endpoint = null;
    protected ?string $token_endpoint = null;
    protected ?array $token_endpoint_auth_methods_supported = null;
    protected ?array $token_endpoint_auth_signing_alg_values_supported = null;
    protected ?array $grant_types_supported = null;
    protected ?string $userinfo_endpoint = null;
    protected ?string $jwks_uri = null;
    protected ?array $scopes_supported = null;
    protected ?array $response_types_supported = null;
    protected ?array $claims_supported = null;

    protected string $client_id = '';
    protected string $client_secret = '';
    protected array $requestedScopes = ['openid'];
    protected string $responseType = 'code';
    protected string $redirectUri = '';

    public function isWellKnownDiscovered(): bool
    {
        return $this->wellKnownDiscovered;
    }

    public function setWellKnownDiscovered(bool $wellKnownDiscovered): void
    {
        $this->wellKnownDiscovered = $wellKnownDiscovered;
    }

    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    public function setIssuer(?string $issuer): void
    {
        $this->issuer = $issuer;
    }

    public function getAuthorizationEndpoint(): ?string
    {
        return $this->authorization_endpoint;
    }

    public function setAuthorizationEndpoint(?string $authorization_endpoint): void
    {
        $this->authorization_endpoint = $authorization_endpoint;
    }

    public function getTokenEndpoint(): ?string
    {
        return $this->token_endpoint;
    }

    public function setTokenEndpoint(?string $token_endpoint): void
    {
        $this->token_endpoint = $token_endpoint;
    }

    public function getTokenEndpointAuthMethodsSupported(): ?array
    {
        return $this->token_endpoint_auth_methods_supported;
    }

    public function setTokenEndpointAuthMethodsSupported(?array $token_endpoint_auth_methods_supported): void
    {
        $this->token_endpoint_auth_methods_supported = $token_endpoint_auth_methods_supported;
    }

    public function getTokenEndpointAuthSigningAlgValuesSupported(): ?array
    {
        return $this->token_endpoint_auth_signing_alg_values_supported;
    }

    public function setTokenEndpointAuthSigningAlgValuesSupported(
        ?array $token_endpoint_auth_signing_alg_values_supported
    ): void {
        $this->token_endpoint_auth_signing_alg_values_supported = $token_endpoint_auth_signing_alg_values_supported;
    }

    public function getGrantTypesSupported(): ?array
    {
        return $this->grant_types_supported;
    }

    public function setGrantTypesSupported(?array $grant_types_supported): void
    {
        $this->grant_types_supported = $grant_types_supported;
    }

    public function getUserinfoEndpoint(): ?string
    {
        return $this->userinfo_endpoint;
    }

    public function setUserinfoEndpoint(?string $userinfo_endpoint): void
    {
        $this->userinfo_endpoint = $userinfo_endpoint;
    }

    public function getJwksUri(): ?string
    {
        return $this->jwks_uri;
    }

    public function setJwksUri(?string $jwks_uri): void
    {
        $this->jwks_uri = $jwks_uri;
    }

    public function getScopesSupported(): ?array
    {
        return $this->scopes_supported;
    }

    public function setScopesSupported(?array $scopes_supported): void
    {
        $this->scopes_supported = $scopes_supported;
    }

    public function getResponseTypesSupported(): ?array
    {
        return $this->response_types_supported;
    }

    public function setResponseTypesSupported(?array $response_types_supported): void
    {
        $this->response_types_supported = $response_types_supported;
    }

    public function getClaimsSupported(): ?array
    {
        return $this->claims_supported;
    }

    public function setClaimsSupported(?array $claims_supported): void
    {
        $this->claims_supported = $claims_supported;
    }

    public function getClientId(): string
    {
        return $this->client_id;
    }

    public function setClientId(string $client_id): void
    {
        $this->client_id = $client_id;
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    public function setClientSecret(string $client_secret): void
    {
        $this->client_secret = $client_secret;
    }

    public function getRequestedScopes(): array
    {
        if (array_search('openid', $this->requestedScopes) === false) {
            $this->requestedScopes[] = 'openid';
        }

        return $this->requestedScopes;
    }

    public function setRequestedScopes(array $requestedScopes): void
    {
        $this->requestedScopes = $requestedScopes;
    }

    public function getResponseType(): string
    {
        $supported = $this->getResponseTypesSupported() ?? [$this->responseType];

        if (array_search($this->responseType, $supported) === false) {
            $this->responseType = $supported[array_key_first($supported)];
        }

        return $this->responseType;
    }

    public function setResponseType(string $responseType): void
    {
        $this->responseType = $responseType;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function setRedirectUri(string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }
}
