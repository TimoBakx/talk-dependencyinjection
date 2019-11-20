<?php
declare(strict_types=1);

namespace App\Counter;

use App\Entity\User;

final class LikeCounter implements CounterInterface
{
    public function count(User $user): int
    {
        return 10;
    }
}
