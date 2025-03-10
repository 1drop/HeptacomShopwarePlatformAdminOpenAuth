# Unreleased

# 5.0.0

**Added**

* Added Shopware 6.5 compatibility with related dependencies
* Added download metadata button to `heptacom-admin-open-auth-client-edit-page` component
* Added configuration option `requestedAuthnContext` to SAML2 provider
* Added plugin configuration option `denyPasswordLogin` to disable password login #14
* Added popup block check for user confirmation modals, that allows more seamless confirmation flow

**Changed**

* Changed provider settings to have it's own component instead of overwriting `heptacom-admin-open-auth-client-edit-page`
* Changed `view/administration/index-js.html.twig` to only check for relevant route matches
* Changed `view/administration/index-js.html.twig` to allow login in `sw-inactivity-login`
* Changed login payload to store the requested redirect url
* Changed loading of custom Admin Vue components to asynchronous loading
* Changed SAML provider to disable the requested authn context by default

**Removed**

* Removed Shopware 6.4 compatibility
* Removed dependency `heptacom/open-auth` and ship its components with the plugin
* Removed Microsoft Azure (non OIDC) and the required dependency `thenetworg/oauth2-azure`
* Removed `\Heptacom\AdminOpenAuth\Contract\TokenRefresherInterface` and implementation `\Heptacom\AdminOpenAuth\Service\TokenRefresher`

**Security**

* Prevent confirmation of another allowed user of the same identity provider, that is not the same user as the currently logged in one, and therefore prevent follow up confirmation and actions

# 4.3.0-beta.2

**Fixed**

* Fixed `administration.heptacom.admin_open_auth.confirm` route by setting a default value for `expiresAt`

# 4.3.0-beta.1

**Added**

* Added `type` to login states to allow different behaviour per intended action
* Added `expiresAt` to login states to remove unused login states after their underlying `authorization_code` should have expired already
* Added `LoginsCleanupTask` to cleanup expired login states

**Fixed**

* Fixed usage of DBAL typed payload for non-admin users. See [AndreasA's contribution on GitHub](https://github.com/HEPTACOM/HeptacomShopwarePlatformAdminOpenAuth/pull/8)

# 4.2.1

* Fixed a bug causing the role assignment to fail and throw an exception

# 4.2.0

* Added client configuration to assign default roles to new non admin users
* Added client configuration to always update the user on login with data from the IDP
* Changed `views/administration/heptacom-admin-open-auth/page/confirm.html.twig` to immediately close the window after local storage item was set
* Changed `Heptacom\AdminOpenAuth\Service\UserResolver` and `Heptacom\AdminOpenAuth\Component\Provider\OpenIdConnectClient::getUser` to add more data to the user (e.g. locale and timezone)
* Fixed `Heptacom\AdminOpenAuth\Controller\AdministrationController::createClient` issues by adding default values in `Heptacom\AdminOpenAuth\Database\ClientDefinition`
* Changed composer dependency constraint of "thenetworg/oauth2-azure" from "^1.4" to "^1.4 | ^2.0" to support projects with PHP 8.0 as minimum version (thanks to Hans Höchtl @hhoechtl)
* Added generic SAML2 provider
* Added JumpCloud provider

# 4.1.0

**Added**

* Add flag to client configurations to disable users role elevation to admin
* Add OpenID Connect provider
* Add Microsoft Azure OIDC provider, using the OpenID Connect provider instead of the external `thenetworg/azure-oauth2` library
* Add Google Cloud provider
* Add Keycloak provider
* Add OneLogin provider
* Add Okta provider
* Add Cidaas provider
* Add help link to `heptacom-admin-open-auth-client-edit-page`
* Add Vue user verification component `heptacom-admin-open-auth-user-confirm-login` to build own user confirmed actions
* Add support verify using OAuth when asked for a password to verify in `sw-verify-user-modal` (generic password confirm component) and `sw-profile-index` (own profile), but not in `sw-users-permissions-user-listing` (admin user listing) as the deletion confirmation is not safely replaceable
* Add ACL for OAuth admins

**Changed**

* Changed create provider page to get a better overview of the existing providers
* Changed `\Heptacom\AdminOpenAuth\Service\OpenAuthenticationFlow::getLoginRoutes` to sort the clients by name
* Changed `sw-profile-index` overwrite to allow changes for connected OAuth clients if users only have `user_change_me` permission

**Deprecated**

* Microsoft Azure will be replaced by the Microsoft Azure OIDC provider in version 5.0.

**Removed**

* Drop Shopware 6.4.0 to 6.4.10 support

**Fixed**

* Fix Shopware 6.4.11 compatibility
* Resolve issues with other plugins, also extending `@Administration/administration/index.html.twig`
* Fix issue that users connected with this plugin cannot be deleted
* Fix display issues for checkbox icons placed in tables that are used outside of this plugin's scope

# 4.0.2

* Fix Shopware 6.4.3 compatibility

# 4.0.1

* Fix Shopware 6.4 compatibility

# 4.0.0

* Add Shopware 6.4 compatibility
* Drop Shopware 6.2 and 6.3 support

# 3.0.3

* Fix bug in Microsoft Azure client when no redirect URI has been given within the redirection steps, Microsoft used the latest registered one to redirect the user. No login happened as a different login form has been presented

# 3.0.2

* Fix bug in Microsoft Azure client when accounts in the Active Directory without Outlook mailing subscription assignment tried to login
* Amend API usage on user connection to always provide an HTTP authentication header
* Amend display of user connections as no longer client types but their names are used
* Fix bug that uncleaned installations are not able to process the configuration `redirectUri`

# 3.0.1

* Fix bug that the extracted resources are not available on plugin installation

# 3.0.0

* Remove duplicate entry in the settings overview
* Fix bug on ZIP-Installations where external dependencies were not loaded
* RedirectURL is now generated automatically to simplify domain changes
* Extract OpenAuth code contracts in new repository heptacom/open-auth
* Add method in ClientContract to authorize API requests 
* Extract ClientFactoryContract from ClientLoader
* Move ClientProviderRepositoryInterface into Heptacom\OpenAuth\ClientProvider\Contract namespace and used Contract pattern
* Move ClientProviderInterface into Heptacom\OpenAuth\ClientProvider\Contract namespace and used Contract pattern
* Move ClientInterface into Heptacom\OpenAuth\Client\Contract namespace and used Contract pattern
* Add RedirectBehaviour class to control redirect process
* Move TokenPairFactory into Heptacom\OpenAuth\Token\Contract namespace and used Contract pattern
* Move TokenPairStruct into Heptacom\OpenAuth\Struct namespace and removed Shopware dependency
* Move UserStruct into Heptacom\OpenAuth\Struct namespace and removed Shopware dependency

# 2.0.0

* Fix typo in administration template registration
* Use make manage project
* Change license from MIT to Apache 2.0
* Rename technical name of plugin to match store rules
* Make plugin compatible to a breaking change in 6.2.3 behoben (Issue NEXT-9240)
* Let login button look similar when focused like other buttons in the login form

# 1.0.2

* Fix missing settings item in administration
* Fix error on token refresh when no new refresh token is provided

# 1.0.1

* Fix bug where migrations were deleted on uninstallation
* Fix login bug as wrong DAL field keys were used 

# 1.0.0

* Add flags to enable clients for logging in and connecting
* Add connect button in administration user profile
* Add configuration in administration
* Add option to revoke connections in personal user profile
* Add custom login grant
* Add Microsoft provider
* Add Atlassian provider
* Add token storage
* Add authorized http client to easily access remote APIs
