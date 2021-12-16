<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Transaction extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // buat tabel bernama 'transactions'
        $transactions = $this->table('transactions', array('id' => 'id_transaction'));

        // buat kolom-kolom untuk users
        $transactions->addColumn('invoice_id', 'integer', ['limit' => 11])
            ->addColumn('references_id', 'integer', ['limit' => 11])
            ->addColumn('merchant_id','integer', ['limit' => 11])
            ->addColumn('item_name', 'string', ['limit' => 64])
            ->addColumn('amount', 'integer', ['limit' => 11])
            ->addColumn('payment_type','string', ['limit' => 64])
            ->addColumn('customer_name','string', ['limit' => 64])
            ->addColumn('number_va','string', ['limit' => 64])
            ->addColumn('status','string', ['limit' => 64])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
