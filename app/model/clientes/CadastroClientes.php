<?php

class CadastroClientes extends TRecord
{
    const TABLENAME  = 'cadastro_clientes';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    const CREATEDAT  = 'data_inclusao';

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('situacao');
        parent::addAttribute('numero_klgama');
        parent::addAttribute('razao_social');
        parent::addAttribute('cnpj_cpf');
        parent::addAttribute('area_atuacao');
        parent::addAttribute('cep');
        parent::addAttribute('estado');
        parent::addAttribute('cidade');
        parent::addAttribute('bairro');
        parent::addAttribute('rua');
        parent::addAttribute('num');
        parent::addAttribute('complemento');
        parent::addAttribute('representante');
        parent::addAttribute('cpf_rep');
        parent::addAttribute('data_inclusao');
        parent::addAttribute('dt_nasci');
        parent::addAttribute('documentos_gd');
            
    }

    /**
     * Method getContatoClientes
     */
    public function getContatoClientes()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cadastro_clientes_id', '=', $this->id));
        return ContatoCliente::getObjects( $criteria );
    }
    /**
     * Method getSenhasAcessoss
     */
    public function getSenhasAcessoss()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cadastro_clientes_id', '=', $this->id));
        return SenhasAcessos::getObjects( $criteria );
    }

    public function set_contato_cliente_cadastro_clientes_to_string($contato_cliente_cadastro_clientes_to_string)
    {
        if(is_array($contato_cliente_cadastro_clientes_to_string))
        {
            $values = CadastroClientes::where('id', 'in', $contato_cliente_cadastro_clientes_to_string)->getIndexedArray('situacao', 'situacao');
            $this->contato_cliente_cadastro_clientes_to_string = implode(', ', $values);
        }
        else
        {
            $this->contato_cliente_cadastro_clientes_to_string = $contato_cliente_cadastro_clientes_to_string;
        }

        $this->vdata['contato_cliente_cadastro_clientes_to_string'] = $this->contato_cliente_cadastro_clientes_to_string;
    }

    public function get_contato_cliente_cadastro_clientes_to_string()
    {
        if(!empty($this->contato_cliente_cadastro_clientes_to_string))
        {
            return $this->contato_cliente_cadastro_clientes_to_string;
        }
    
        $values = ContatoCliente::where('cadastro_clientes_id', '=', $this->id)->getIndexedArray('cadastro_clientes_id','{cadastro_clientes->situacao}');
        return implode(', ', $values);
    }

    public function set_senhas_acessos_cadastro_clientes_to_string($senhas_acessos_cadastro_clientes_to_string)
    {
        if(is_array($senhas_acessos_cadastro_clientes_to_string))
        {
            $values = CadastroClientes::where('id', 'in', $senhas_acessos_cadastro_clientes_to_string)->getIndexedArray('situacao', 'situacao');
            $this->senhas_acessos_cadastro_clientes_to_string = implode(', ', $values);
        }
        else
        {
            $this->senhas_acessos_cadastro_clientes_to_string = $senhas_acessos_cadastro_clientes_to_string;
        }

        $this->vdata['senhas_acessos_cadastro_clientes_to_string'] = $this->senhas_acessos_cadastro_clientes_to_string;
    }

    public function get_senhas_acessos_cadastro_clientes_to_string()
    {
        if(!empty($this->senhas_acessos_cadastro_clientes_to_string))
        {
            return $this->senhas_acessos_cadastro_clientes_to_string;
        }
    
        $values = SenhasAcessos::where('cadastro_clientes_id', '=', $this->id)->getIndexedArray('cadastro_clientes_id','{cadastro_clientes->situacao}');
        return implode(', ', $values);
    }

    
}

