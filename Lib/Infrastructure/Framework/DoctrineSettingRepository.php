<?php

namespace Galileo\SettingBundle\Lib\Infrastructure\Framework;

use Doctrine\ORM\EntityManagerInterface;
use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepositoryInterface;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class DoctrineSettingRepository implements SettingRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function findWithinSection(Key $settingKey, Section $settingSection)
    {
        return $this->entityManager->getRepository('GalileoSettingBundle:Setting')->findOneBy(
            [
                'name' => $settingKey->key(),
                'section' => $settingSection->name(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function save(Setting $setting)
    {
        $this->entityManager->transactional(
            function () use ($setting){
                $this->entityManager->persist($setting);
                $this->entityManager->flush();
            }
        );
    }
}
