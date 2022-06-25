<?php

namespace App\Repositories\recruitment\Job;

interface JobRepositoryInterface 
{
    public function getAllRoles();
    public function getRoleById($roleId);
    public function deleteRole($orderId);
    public function createRole(array $roleDetails);
    public function updateRole($roleId, array $newDetails);
    //public function getFulfilledOrders();
}