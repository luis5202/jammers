<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Costo de Envio', 
                'slug' => 'costo-envio', 
                'description' => 'Categoria que debe estar en la base de datos para guardar el costo de envío', 
                'color' => '#440022'
            ],
            [
                'name' => 'Monster', 
                'slug' => 'monster', 
                'description' => 'Dispositivos de gran alcance que pueden bloquear señales en un radio muy amplio. Señales tales como 3G, GSM, GPS', 
                'color' => '#440022'
            ],
            [
                'name' => 'Mini', 
                'slug' => 'mini', 
                'description' => 'Dispositivos portatiles que bloquean señales dependiendo del tipo y pueden bloquear cualquier tipo de seal', 
                'color' => '#445500'
            ]
        );
 
        Category::insert($data);
    }
}