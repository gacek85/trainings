<?php

namespace Training\Bundle\SampleBundle\Tests\Behat;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Oro\Bundle\TestFrameworkBundle\Behat\Isolation\ReferenceRepositoryInitializerInterface;
use Oro\Bundle\TestFrameworkBundle\Test\DataFixtures\Collection;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * Loads default customer user email
 */
class ReferenceRepositoryInitializer implements ReferenceRepositoryInitializerInterface
{
    /**
     * {@inheritdoc}
     */
    public function init(Registry $doctrine, Collection $referenceRepository): void
    {
        $repo = $doctrine->getManagerForClass(User::class)->getRepository(User::class);
        $user = $repo->findOneBy([
            'username' => 'mgarycki'
        ]);

        $referenceRepository->set('new_owner', $user);
    }
}
