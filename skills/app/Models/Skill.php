<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    const SKILL_STATUS_NOT_YET = 1;
    const SKILL_STATUS_LEARNING = 2;
    const SKILL_STATUS_LEARNED = 3;
    const SKILL_STATUS_RELEARN = 4;
    const SKILL_STATUS_MASTER = 5;

    const SKILL_STATUS_NAME_NOT_YET = '未学習';
    const SKILL_STATUS_NAME_LEARNING = '学習中';
    const SKILL_STATUS_NAME_LEARNED = '学習済み';
    const SKILL_STATUS_NAME_RELEARN = '再学習';
    const SKILL_STATUS_NAME_MASTER = 'マスター';

    const SKILL_STATUS_OBJECT = [
        self::SKILL_STATUS_NOT_YET => self::SKILL_STATUS_NAME_NOT_YET,
        self::SKILL_STATUS_LEARNING => self::SKILL_STATUS_NAME_LEARNING,
        self::SKILL_STATUS_LEARNED => self::SKILL_STATUS_NAME_LEARNED,
        self::SKILL_STATUS_RELEARN => self::SKILL_STATUS_NAME_RELEARN,
        self::SKILL_STATUS_MASTER => self::SKILL_STATUS_NAME_MASTER,

    ];
}
