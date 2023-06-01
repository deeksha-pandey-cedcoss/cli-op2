<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class CurrentTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
        $collection = $this->mongo->orders;
        $status = $collection->insertOne([
            "name" => "fourth",
            "status" => "pending",
            "price" => null,
            "pid" => null,
        ]);
        die;
    }
    public function orderAction()
    {
        $collection = $this->mongo->order;

        $data = $collection->updateOne(
            ["name" => null, "price" => null, "pid" => null],
            ['$set' => ["status" => "Rejected"],],
        );
        print_r($data);

        die;
    }
}
