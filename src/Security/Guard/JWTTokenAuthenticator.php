<?php

declare(strict_types=1);

namespace App\Security\Guard;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

/**
 * Class JWTTokenAuthenticator.
 */
class JWTTokenAuthenticator extends BaseAuthenticator
{
    /**
     * JWTTokenAuthenticator constructor.
     *
     * @param JWTTokenManagerInterface  $jwtManager     JWTTokenManagerInterface.
     * @param EventDispatcherInterface  $dispatcher     EventDispatcherInterface.
     * @param TokenExtractorInterface   $tokenExtractor TokenExtractorInterface.
     */
    public function __construct(
        JWTTokenManagerInterface $jwtManager,
        EventDispatcherInterface $dispatcher,
        TokenExtractorInterface $tokenExtractor
    ) {
        parent::__construct($jwtManager, $dispatcher, $tokenExtractor);
    }
}