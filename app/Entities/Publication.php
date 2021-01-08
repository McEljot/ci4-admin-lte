<?php

namespace App\Entities;

use App\Models\UserModel;
use CodeIgniter\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $file
 * @property User $user
 * @property int $user_id
 * @property Time $created_at
 * @property Time $updated_at
 */
class Publication extends Entity
{
    protected $casts = [
        'id' => 'integer',
    ];

    public function getUser()
    {
        return $this->user_id ? (new UserModel())->find($this->user_id) : null;
    }

    public function setUser(User $x)
    {
        $this->user_id = $x->id;
    }

    public function getExcerpt($length = 60)
    {
        return get_excerpt($this->content, $length);
    }
}
