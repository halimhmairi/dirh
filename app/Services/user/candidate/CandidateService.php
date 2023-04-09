<?php

namespace App\Services\user\Candidate; 
use App\Models\User; 
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use App\Services\user\UserInterface;

class CandidateService implements UserInterface {

    public function store($candidate) : array 
    { 

        $user = [
            "name" => $candidate['name'],
            "email" => $candidate['email'],
            "password" => Hash::make($candidate['password'])
        ];

       $user = User::create($user); 
 
        if($candidate['resume'])
        {
            $originalResume = $candidate['resume']; 
            $originalPath = public_path()."/resume/"; //TODO : if folder not found created
            $newNameResume = "resume_".$candidate['name']."_".time().$originalResume->getClientOriginalName();
     
            $candidate['resume']->move($originalPath,$newNameResume); 
 
            $candidate['resume'] = $newNameResume; 
        }

        unset($candidate['name']);
        unset($candidate['email']);
        unset($candidate['password']); 

        $candidate['user_id'] =  $user->id;   

       return Candidate::create($candidate)->toArray();

    }
    
}