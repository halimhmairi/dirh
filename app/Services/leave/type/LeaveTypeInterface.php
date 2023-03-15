<?php 
namespace App\Services\leave\type;

interface LeaveTypeInterface
{
    public function availableLeaveTypes(object $user): array ;
    public function availableLeaveTypesByUser(object $user): array ;
}