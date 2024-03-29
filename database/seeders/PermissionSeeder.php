<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear cursos'
        ]);

        Permission::create([
            'name' => 'Leer cursos'
        ]);

        Permission::create([
            'name' => 'Actualizar cursos'
        ]);

        Permission::create([
            'name' => 'Eliminar cursos'
        ]);

        Permission::create([
            'name' => 'Ver Dashboard'
        ]);

        Permission::create([
            'name' => 'Crear Role'
        ]);

        Permission::create([
            'name' => 'Listar Role'
        ]);

        Permission::create([
            'name' => 'Editar Role'
        ]);

        Permission::create([
            'name' => 'Eliminar Role'
        ]);

        Permission::create([
            'name' => 'Leer usuario'
        ]);

        Permission::create([
            'name' => 'Editar usuario'
        ]);
    }
}
