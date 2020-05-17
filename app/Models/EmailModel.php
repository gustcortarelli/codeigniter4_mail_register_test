<?php namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    
    protected $primaryKey = 'id';

    protected $table         = 'email';
    protected $allowedFields = [
        'email', 'username'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    protected $returnType    = 'App\Entities\EmailEntity';

    protected $validationRules    = [
        'username' => [
                'label' => 'app.label.user',
                'rules' => 'required|max_length[80]',
                'errors' => [
                    'required' => 'app.email.message.error_user_required',
                    'max_length' => 'app.email.message.error_user_max_length'
                ]
            ]
        ,
        'email' => [
                'label' => 'app.label.email',
                'rules' => 'required|valid_email|my_email_validation|max_length[200]|is_unique[email.email,id,{id}]',
                'errors' => [
                    'required' => 'app.email.message.error_email_required',
                    'max_length' => 'app.email.message.error_email_max_length',
                    'is_unique' => 'app.email.message.error_email_is_unique'
                ]
        ]
    ];

}