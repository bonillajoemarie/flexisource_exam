<?php


namespace App\Repositories;


use GuzzleHttp\Client;

class CustomerImporterRepository
{
    /**
     * @var CustomerRepositories
     */
    private $repo;

    /**
     * CustomerImporterRepository constructor.
     * @param CustomerRepositories $repositories
     */
    public function __construct(CustomerRepositories $repositories)
    {
        $this->repo = $repositories;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchCustomers()
    {
        $client = new Client();
        $response = $client->get('https://randomuser.me/api?nat=AU');
        $this->prepareData(json_decode($response->getBody()->getContents(), true));
    }

    /**
     * @param $input
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function prepareData($input)
    {
        foreach ($input['results'] as $key => $item) {
            if ($item) {
                $prepare_data = [
                    'first_name' => $item['name']['first'],
                    'last_name' => $item['name']['last'],
                    'username' => $item['login']['username'],
                    'password' => md5($item['login']['password']),
                    'email' => $item['email'],
                    'gender' => $item['gender'],
                    'country' => $item['location']['country'],
                    'city' => $item['location']['city'],
                    'phone' => $item['phone'],
                ];
                $this->repo->create($prepare_data);
            }
        }
    }
}
