<?php
declare(strict_types=1);

namespace App\Counter;

use App\Entity\User;

interface CounterInterface
{
    public function count(User $user): int;
}
