<?php

namespace App\Repositories\recruitment\candidate;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Candidate;
/**
 * Class CandidateRepository.
 */
class CandidateRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Candidate::class;
    }
}
