<?php 

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Email entity
 */
class EmailEntity extends Entity {

    protected $attributes = [
        'id'            => null,
        'username'      => null,
        'email'         => null,
        'created_at'    => null,
    ];

    protected $dates = ['created_at'];

}