<?php

namespace App\Repositories\recruitment\Job;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Job;
/**
 * Class Job.
 */
class JobRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Job::class;
    }
}
