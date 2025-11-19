<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'auditoria'=>[
                'Visualizar',
            ],
            'galeria'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'categorias do noticias'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'contato'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'depoimentos'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'secao depoimento'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'estatistica do sobre'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'horario de funcionamento'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'email'=>[
                'Visualizar',
                'configurar smtp',
                'testar conexao smtp'
            ],
            'secao servicos'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'grupo'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'lead contato'=>[
                'Visualizar',
                'Remover'
            ],
            'newsletter'=>[
                'Visualizar',
                'Remover'
            ],
            'noticias'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Aprovar, Reprovar ou Remover Comentário',
                'Remover'
            ],
            'notificacao'=>[               
                'Visualizar',
                'Notificacao de auditoria',
            ],
            'reservas'=>[
                'Confirmar',
                'Cancelar',                
                'Visualizar'
            ],
            'servicos'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'secao reserve aqui'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'slide'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'sobre nos'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'topicos'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'usuario'=>[
                'Criar',
                'Editar',
                'Visualizar',
                'Remover',
                'Visualizar outros usuarios',
                'Atribuir grupos',
                'Tornar usuario master'
            ]
        ];

        foreach($permissions as $key => $permission){
            foreach($permission as $value){
                Permission::create([
                    'name'=>strtolower("{$key}.{$value}")
                ]);
            }
        }
    }
}
