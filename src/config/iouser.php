<?php

return  [
    "mainEmail" => env('IOUSER_MAIN_EMAIL', 'suporte@dataview.com.br'),
    'activation' => [
      'email' => env('IOUSER_ACTIVATION_EMAIL', null),
      'from' => env('IOUSER_ACTIVATION_FROM', 'IntranetOne Dataview'),
      'subject' => env('IOUSER_ACTIVATION_SUBJECT', 'Ativação de cadastro')
  ]
];