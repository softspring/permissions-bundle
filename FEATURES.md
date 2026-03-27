# Permissions Component Features

Functional definition for `softspring/permissions-bundle`.

## Purpose

- Provide a small Symfony security integration for `PERMISSION_*` attributes.
- Keep business roles and action-level permissions clearly separated.
- Let applications and reusable packages share a stable permission naming model.

## Main Features

- Registers a dedicated `RoleHierarchyVoter` for the `PERMISSION_` prefix.
- Makes `PERMISSION_*` attributes work with Symfony `role_hierarchy`.
- Supports permission checks in controllers, Twig templates, config-driven menus, and reusable controller config.
- Works together with custom voters that refine or deny access for specific subjects.

## Integration And Extension

- Integrates with Symfony Security.
- Loads one service definition and requires no custom bundle configuration.
- Can be installed through Symfony Flex or manual bundle registration.
- Is designed to be combined with higher-level packages such as `user-bundle`, `media-bundle`, `account-bundle`, or custom application voters.

## Expected Capabilities

- Must work with the supported dependency matrix of this line, including Symfony `6.4`, `7.x`, and `8.x`.
- Must keep both regular and lowest dependency validation workflows working (`composer test` and `composer test-bc`).
- Must keep the `PERMISSION_*` hierarchy behavior stable across minor releases in the same line.
