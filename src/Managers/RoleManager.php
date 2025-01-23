<?php

class RoleManager {

    public function unsetAdminFromRoles() 
    {
        $roleRepository = new RoleRepository();
        $roles = $roleRepository->findAll();

        foreach ($roles as $index => $role) {
            if ($role->getRole() === "admin") {
                unset($roles[$index]);
            }
        }
        
        return $roles;
    }
}