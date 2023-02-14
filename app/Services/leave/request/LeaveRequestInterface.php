<?php 
namespace App\Services\leave\request;

interface LeaveRequestInterface
{
    public function haveLeaveBalance(object $user, array $leaveRequestInfomation) : bool;

    public function storeLeaveRequest(object $request,object $user);

    public function updateLeaveRequest(object $leaveRequests,object $user);
}