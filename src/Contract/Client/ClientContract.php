<?php

declare(strict_types=1);

namespace Heptacom\AdminOpenAuth\Contract\Client;

use Heptacom\AdminOpenAuth\Contract\RedirectBehaviour;
use Heptacom\AdminOpenAuth\Contract\TokenPair;
use Heptacom\AdminOpenAuth\Contract\User;
use Psr\Http\Message\RequestInterface;

abstract class ClientContract
{
    abstract public function getLoginUrl(?string $state, RedirectBehaviour $behaviour): string;

    abstract public function refreshToken(string $refreshToken): TokenPair;

    abstract public function getUser(string $state, string $code, RedirectBehaviour $behaviour): User;

    abstract public function authorizeRequest(RequestInterface $request, TokenPair $token): RequestInterface;
}
