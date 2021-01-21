<?php


namespace App\Repositories;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Exception;
use App\Entities\Customer;
use Illuminate\Support\Facades\App;

class CustomerRepositories implements CustomerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param $input
     * @return mixed|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create($input)
    {
        $customer = new Customer($input);
        $this->em->persist($customer);
        $this->em->flush();
        return $customer;
    }

    /**
     * @return mixed|void
     */
    public function getAllCustomers()
    {
        /* @var \App\Entities\Customer $customer */
        $customer = $this->em->getRepository(Customer::class)->findAll();
        $prepare_data = [];
        foreach ($customer as $item) {
            $prepare_data[] = [
                'full_name' => $item->getFirstName() . ' ' . $item->getLastName(),
                'email' => $item->getEmail(),
                'country' => $item->getCountry(),
            ];
        }
        return response()->json($prepare_data);

    }

    /**
     * @param $id
     * @return mixed|object|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getCustomerById($id)
    {
        /* @var \App\Entities\Customer $customer */
        $customer = $this->em->find(Customer::class, $id);
        $prepare_data = [
            'full_name' => $customer->getFirstName() . ' ' . $customer->getLastName(),
            'email' => $customer->getEmail(),
            'username' => $customer->getUsername(),
            'gender' => $customer->getGender(),
            'country' => $customer->getCountry(),
            'city' => $customer->getCity(),
            'phone' => $customer->getPhone(),
        ];

        return response()->json($prepare_data);
    }
}
