<?php


use Phinx\Seed\AbstractSeed;

class Transactions extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'invoice_id' => 1,
                'references_id' => 1,
                'merchant_id' => 1,
                'item_name' => 'Book',
                'amount' => 2,
                'payment_type' => 'Virtual Account',
                'customer_name' => 'Joen Doe',
                'number_va' => '2318791',
                'status' => 'Pending'
                )
            
        );

        $transaction = $this->table('transactions');
        $transaction->insert($data)->save();
    }
}
