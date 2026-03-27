<?php

declare(strict_types=1);

namespace Softspring\PermissionsBundle\Tests\Security;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchy;

final class PermissionRoleHierarchyVoterTest extends TestCase
{
    public function testPermissionAttributesAreGrantedThroughRoleHierarchy(): void
    {
        $voter = new RoleHierarchyVoter(new RoleHierarchy([
            'ROLE_ADMIN' => ['PERMISSION_TEST_ACTION'],
        ]), 'PERMISSION_');

        $token = $this->createMock(TokenInterface::class);
        $token->method('getRoleNames')->willReturn(['ROLE_ADMIN']);

        self::assertSame(VoterInterface::ACCESS_GRANTED, $voter->vote($token, null, ['PERMISSION_TEST_ACTION']));
    }

    public function testNonPermissionAttributesAreIgnoredByThePermissionVoter(): void
    {
        $voter = new RoleHierarchyVoter(new RoleHierarchy([
            'ROLE_ADMIN' => ['PERMISSION_TEST_ACTION'],
        ]), 'PERMISSION_');

        $token = $this->createMock(TokenInterface::class);
        $token->method('getRoleNames')->willReturn(['ROLE_ADMIN']);

        self::assertSame(VoterInterface::ACCESS_ABSTAIN, $voter->vote($token, null, ['ROLE_ADMIN']));
    }
}
