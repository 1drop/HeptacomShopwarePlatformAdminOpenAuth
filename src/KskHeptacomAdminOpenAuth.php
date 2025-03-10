<?php

declare(strict_types=1);

namespace Heptacom\AdminOpenAuth;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

final class KskHeptacomAdminOpenAuth extends Plugin
{
    public const CONFIG_DENY_PASSWORD_LOGIN = 'KskHeptacomAdminOpenAuth.config.denyPasswordLogin';

    public function executeComposerCommands(): bool
    {
        return true;
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

        /** @var Connection $connection */
        $connection = $this->container->get(Connection::class);

        if (!$uninstallContext->keepUserData()) {
            $schemaManager = $connection->createSchemaManager();

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_user_email')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_user_email');
            }

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_user_key')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_user_key');
            }

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_user_token')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_user_token');
            }

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_login')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_login');
            }

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_client_role')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_client_role');
            }

            if ($schemaManager->tablesExist('heptacom_admin_open_auth_client')) {
                $schemaManager->dropTable('heptacom_admin_open_auth_client');
            }
        }
    }
}
