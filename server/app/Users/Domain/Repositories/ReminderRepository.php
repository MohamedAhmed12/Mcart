<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\App\Domain\Traits\IssueTokens;
use App\Users\Domain\Models\Reminder;

class ReminderRepository extends Repository
{
    use IssueTokens;
    protected $model;
    protected $process = 'reminder';

    public function __construct(Reminder $model)
    {
        $this->model = $model;
    }
}
