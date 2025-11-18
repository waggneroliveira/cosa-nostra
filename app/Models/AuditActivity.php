<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditActivity extends Model
{
    use HasFactory;

    public static function getModelName($subjectType)
    {
        switch ($subjectType) { 
            case About::class:
                return 'Sobre Nós';
            case BenefitTopic::class:
                return 'Galeria';
            case Blog::class:
                return 'Notícias';
            case BlogCategory::class:
                return 'Categoria de notícias';
            case Contact::class:
                return 'Contato';
            case Direction::class:
                return 'Serviço';
            case Depoiment::class:
                return 'Depoimentos';
            case FormIndex::class:
                return 'Lead contato - Informações enviadas pelo site (formulário de contato)';
            case Holidays::class:
                return 'Feriados';
            case Juridico::class:
                return 'Jurídico';
            case Municipality::class:
                return 'Municípios';
            case Newsletter::class:
                return 'Newsletter - E-mail enviado pelo site';
            case Noticies::class:
                return 'Horário de funcionamento';
            case Partner::class:
                return 'Parceiros';
            case Report::class:
                return 'Seção depoimento';
            case Role::class:
                return __('blades/audit.roles');
            case SettingEmail::class:
                return __('blades/audit.setting_email');
            case Slide::class:
                return 'Slides';
            case Statute::class:
                return 'Seção Serviços';
            case Topic::class:
                return 'Tópicos';
            case Unionized::class:
                return 'Estatística do sobre';
            case User::class:
                return __('blades/audit.users');
            default:
                return __('blades/audit.system');
        }
    }
}
