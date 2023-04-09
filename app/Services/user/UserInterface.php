<?php

namespace App\Services\user;

interface UserInterface {

    public function store($candidate): array;

}