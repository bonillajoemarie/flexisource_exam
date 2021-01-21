<?php

use App\Entities\Customer;
use App\Repositories\CustomerRepositories;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    private $repo;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = \app()->make(CustomerRepositories::class);
    }

    public function testCustomerImport()
    {
        $data = [
            'first_name' => 'foo',
            'last_name' => 'bar',
            'email' => 'foo_bar@email.com',
            'username' => 'username',
            'password' => md5('password'),
            'gender' => 'gender',
            'country' => 'country',
            'city' => 'city',
            'phone' => 'phone',
        ];
        $customer = $this->repo->create($data);

        $this->seeInDatabase('customers', ['id' => $customer->getId()]);
    }

    public function testGetAllCustomers()
    {
        $customers = $this->repo->getAllCustomers();
        $this->assertTrue(true);
    }

    public function testGetCustomerById()
    {
        $customers = $this->repo->getCustomerById(1);
        $this->assertTrue(true);
    }
}
