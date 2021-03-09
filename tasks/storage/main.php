<?php

//interfeiss apraksta TIKAI publiskas metodes!!!

//interface StorageInterface
//{
//    public function save(): void;
//}
//
//class DatabaseStorage implements StorageInterface
//{
//    public function save(): void
//    {
//        var_dump('saving in database');
//    }
//}
//
//var_dump((new DatabaseStorage)->save());
//
//class Application
//{
//    public function run(StorageInterface $storage)
//    {
//        $storage->save();
//    }
//}
//
//(new Application)->run( new DatabaseStorage);

interface Payment
{
    public function pay(): void;
}

class PaypalPayment implements Payment
{
    public function pay(): void
    {
        var_dump('Pay with paypal');
    }
}

class CreditCardPayment implements Payment
{
    public function pay(): void
    {
        var_dump('Pay with cc');
    }
}

class Application
{
    public function run(): void
    {
        $paymentMethod = readline('Enter payment method: ');
        $payment = null;

        switch ($paymentMethod)
        {
            case 'paypal':
                $payment = new PaypalPayment;
                break;
            case 'cc':
                $payment = new CreditCardPayment;
                break;
            default:
                $payment = new PaypalPayment;
        }
        $this->executePayment($payment);
    }

    private function executePayment(Payment $payment)
    {
        $payment->pay();
    }
}

(new Application)->run();