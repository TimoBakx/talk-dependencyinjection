<?php
declare(strict_types=1);

namespace App\Services;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Iterator;

final class UserCreator
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var Notifier[]
     */
    private $notifiers;

    /**
     * @param iterable<Notifier> $notifiers
     */
    public function __construct(EntityManagerInterface $entityManager, iterable $notifiers)
    {
        $this->entityManager = $entityManager;
        $this->notifiers = $notifiers;
    }

    public function createUser(string $email)
    {
        $user = new User($email);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        foreach ($this->notifiers as $notifier) {
            $notifier->notify($user);
        }
    }
}
