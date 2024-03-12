<?php

class Cartera
{
    private $clients = [];


    public function getClient($id)
    {
        foreach ($this->clients as $client) {
            if ($client->getId() == $id)
                return $client;
        }
        return new Empresa(null, null, null, null, null);
    }

   

    public function delete($id)
    {
       
    }

    public function update($datos)
    {
        
    }

   

    public function insert($datos)
    {

       
    }

 
}
?>