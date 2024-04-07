<?php

return [

    'listes' => [

        'sexe' => [
            'H' => 'Homme',
            'F' => 'Femme',
        ],
        'ouinon' => [
            'O' => 'Oui',
            'N' => 'Non'
        ],
        'typetier' => [
            1 => 'Client',
            2 => 'Fournisseur',
            3 => 'Employé',
        ],
        'titre' => [
            'Mr' => 'Mr',
            'Mme' => 'Mme',
            'Mlle'=> 'Mlle',
            'Ste' => 'Sociéte',
        ],
    ],

    'medias' => [
        // Allowed file types with . prefix
        'allowed' => '.pdf,.doc,.xls,.docx,.xlsx,.jpg,.png,.gif,.jpeg',
        // Max file size in KB
        'max_size' => 5000
        
    ]
];
