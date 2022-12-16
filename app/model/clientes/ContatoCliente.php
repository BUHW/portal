<?php

class ContatoCliente extends TRecord
{
    const TABLENAME  = 'contato_cliente';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $cadastro_clientes;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('cadastro_clientes_id');
        parent::addAttribute('nome_contato');
        parent::addAttribute('depto_contato');
        parent::addAttribute('fone_contato');
        parent::addAttribute('email_contato');
            
    }

    /**
     * Method set_cadastro_clientes
     * Sample of usage: $var->cadastro_clientes = $object;
     * @param $object Instance of CadastroClientes
     */
    public function set_cadastro_clientes(CadastroClientes $object)
    {
        $this->cadastro_clientes = $object;
        $this->cadastro_clientes_id = $object->id;
    }

    /**
     * Method get_cadastro_clientes
     * Sample of usage: $var->cadastro_clientes->attribute;
     * @returns CadastroClientes instance
     */
    public function get_cadastro_clientes()
    {
    
        // loads the associated object
        if (empty($this->cadastro_clientes))
            $this->cadastro_clientes = new CadastroClientes($this->cadastro_clientes_id);
    
        // returns the associated object
        return $this->cadastro_clientes;
    }

    
}

