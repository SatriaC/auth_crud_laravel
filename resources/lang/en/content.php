<?php

return [
    'message' => [
        'create' => [
            'success' => 'Data has been created.',
            'failed' => 'Could not create :object. Please check again.',
        ],
        'login' => [
            'success' => 'Login is success.',
            'failed' => 'Could not create :object. Please check again.',
        ],
        'read' => [
            'success' => 'Data found.',
            'failed' => 'Could not found data :object.',
        ],
        'update' => [
            'success' => 'Data has been updated.',
            'failed' => 'Could not update :object. Please check again.',
            'prohibited' => 'The proposal has been approved/rejected. It can not be updated.',
        ],
        'delete' => [
            'success' => 'Data has been deleted.',
            'failed' => 'Could not delete :object. Please check again.',
        ],
        'product' => [
            'not_available' => 'The stocks does not suffice your request of quantity. Please chcek again.',
            'not_enough' => 'Your points is not enough to redeem the gift. Please chcek again.',
        ],

        'not_match' => 'These credentials do not match our records.',
        'not_registered' => 'Email is not registered',
        'not_authorize' => 'You\'re not authorize to perform this action.',

        'dependency' => 'The data still has dependency to another. It can\'t be deleted. Please check again.',

        'image' => [
            'empty' => 'Image cannot be empty'
        ]
    ],

];
