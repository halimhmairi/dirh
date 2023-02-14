<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User; 
use App\Models\LeaveCounter; 
use App\Services\leave\request\LeaveRequestService;

class LeaveTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_haveLeaveBalance()
    {
        $leaveRequestService = new LeaveRequestService();

        $user = User::where("status","active")->first();

        $leaveRequestInfomation = 
        [
          "start_date" => "2023-02-06 08:19:05",
          "end_date" => "2023-02-11 08:19:05",
          "leave_type_id" => 2
        ]; 

        $result = $leaveRequestService->haveLeaveBalance($user,$leaveRequestInfomation);

        $this->assertEquals(true, $result); 
 
    } 

}
