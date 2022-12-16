<?php

class CadastroAreaDeAtuacao extends TRecord
{
    const TABLENAME  = 'cadastro_area_de_atuacao';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('area_atuacao');
            
    }

    
}

