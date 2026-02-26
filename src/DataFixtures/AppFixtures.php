<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\Venue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $accounts = [
            [
                'email' => 'useraccount@gmail.com',
                'roles' => [],
                'password' => 'User@1234',
                'firstName' => 'Normal',
                'lastName' => 'User',
                'phone' => '09234567891',
            ],
            [
                'email' => 'staffaccount@gmail.com',
                'roles' => ['ROLE_STAFF'],
                'password' => 'Staff@1234',
                'firstName' => 'Staff',
                'lastName' => 'Member',
                'phone' => '0987654321',
            ],
            [
                'email' => 'pacificooyanib@gmail.com',
                'roles' => ['ROLE_ADMIN'],
                'password' => 'Admin@1234',
                'firstName' => 'Admin',
                'lastName' => 'Account',
                'phone' => '0912345678',
            ],
        ];

        foreach ($accounts as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setRoles($data['roles']);

            $hashed = $this->passwordHasher->hashPassword($user, $data['password']);
            $user->setPassword($hashed);

            $manager->persist($user);
        }

        $venues = [
            [
                'name' => 'testing',
                'address' => 'test',
                'capacity' => 500,
            ],
            [
                'name' => 'qwerg',
                'address' => 'dasdahsda',
                'capacity' => 200,
            ],
            [
                'name' => 'testing',
                'address' => 'balay',
                'capacity' => 300,
            ],
        ];

        foreach ($venues as $data) {
            $venue = new Venue();
            $venue->setName($data['name']);
            $venue->setAddress($data['address']);
            $venue->setCapacity($data['capacity']);

            $manager->persist($venue);
        }

        $events = [
            [
                'title' => 'test data',
                'description' => 'test',
                'startDate' => new \DateTime('2026-03-15'),
                'endDate' => new \DateTime('2026-03-17'),
                'price' => 150,
                'maxAttendees' => '500',
                'status' => 'active',
            ],
            [
                'title' => 'qwerert',
                'description' => 'testin',
                'startDate' => new \DateTime('2026-07-20'),
                'endDate' => new \DateTime('2026-07-22'),
                'price' => 100,
                'maxAttendees' => '1000',
                'status' => 'active',
            ],
            [
                'title' => 'Basta booked',
                'description' => 'wala ra',
                'startDate' => new \DateTime('2026-05-10'),
                'endDate' => new \DateTime('2026-05-10'),
                'price' => 75,
                'maxAttendees' => '100',
                'status' => 'upcoming',
            ],
        ];

        foreach ($events as $data) {
            $event = new Event();
            $event->setTitle($data['title']);
            $event->setDescription($data['description']);
            $event->setStartDate($data['startDate']);
            $event->setEndDate($data['endDate']);
            $event->setPrice($data['price']);
            $event->setMaxAttendees($data['maxAttendees']);
            $event->setStatus($data['status']);

            $manager->persist($event);
        }

        $manager->flush();
    }

}
