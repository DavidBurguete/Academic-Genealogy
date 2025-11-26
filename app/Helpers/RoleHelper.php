<?php

if (! function_exists('hasRoleOrSuperior')) {
    /**
     *
     * @param string $userRole
     * @param string $requiredRole
     * @return bool
     */
    function hasRoleAtLeast($userRole, $requiredRole)
    {
        $roleLevels = [
            'super-admin' => 3,
            'admin' => 2,
            'base' => 1,
        ];

        if (!isset($roleLevels[$userRole]) || !isset($roleLevels[$requiredRole])) {
            return false;
        }

        return $roleLevels[$userRole] >= $roleLevels[$requiredRole];
    }
}