<?php

namespace App\Http\Factory; 

interface FileFactory
{
    public function saveFile($path): FileFactory;
}