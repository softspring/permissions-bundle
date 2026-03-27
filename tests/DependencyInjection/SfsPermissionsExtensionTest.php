<?php

declare(strict_types=1);

namespace Softspring\PermissionsBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Softspring\PermissionsBundle\DependencyInjection\SfsPermissionsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter;

final class SfsPermissionsExtensionTest extends TestCase
{
    public function testItRegistersPermissionRoleHierarchyVoter(): void
    {
        $container = new ContainerBuilder();
        $extension = new SfsPermissionsExtension();

        $extension->load([], $container);

        self::assertTrue($container->hasDefinition('sfs_permissions.role_hierarchy.permission'));

        $definition = $container->getDefinition('sfs_permissions.role_hierarchy.permission');

        self::assertSame(RoleHierarchyVoter::class, $definition->getClass());
        self::assertSame('PERMISSION_', $definition->getArgument('$prefix'));
    }
}
