<?php
/**
 * AreasDeAtuacaoFormList
 *
 * @version    1.0
 * @package    control
 * @subpackage communication
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AreasDeAtuacaoFormList extends TPage
{
    protected $form; // form
    protected $datagrid; // datagrid
    protected $pageNavigation;
    
    use Adianti\Base\AdiantiStandardFormListTrait; // standard form/list methods
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    public function __construct()
    {
        parent::__construct();
        parent::setTargetContainer("adianti_right_panel");
        
        $this->setDatabase('portal');            // defines the database
        $this->setActiveRecord('CadastroAreaDeAtuacao');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        // $this->setCriteria($criteria) // define a standard filter
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_CadastroDeAreasDeAtuacao');
        $this->form->setFormTitle('Cadastro de Áreas de Atuação');
        $this->form->addHeaderActionLink( _t('Close'), new TAction([$this, 'onClose']), 'fa:times red');
        
        // create the form fields
        $id = new TEntry('id');
        $area_atuacao = new TEntry('area_atuacao');
        $id->setEditable(FALSE);

        // add the fields
        $this->form->addFields( [new TLabel('ID')], [$id] );
        $this->form->addFields( [new TLabel('Nova Área de Atuação')], [$area_atuacao] );
        $id->setSize('30%');
        $area_atuacao->setSize('50%');
        $area_atuacao->addValidation("Área de Atuação", new TRequiredValidator()); 
        
        // create the form actions
        $btn = $this->form->addAction(('Adicionar Novo'), new TAction(array($this, 'onSaveAreaDeAtuacao')), 'far:save');
        $btn->class = 'btn btn-sm btn-primary';
        //$this->form->addAction(_t('Clear form'),  new TAction(array($this, 'onEdit')), 'fa:eraser red');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        $this->datagrid->disableDefaultClick();
        $this->setLimit(-1); // turn off limit for datagrid (retira paginação)


        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', '', 'left', 50);
        $column_area_atuacao = new TDataGridColumn('area_atuacao', '', 'left');
      

        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_area_atuacao);

        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array('AreasDeAtuacaoForm', 'onEdit'));
        //$action1->setUseButton(TRUE);
        $action1->setButtonClass('btn btn-default');
        $action1->setLabel(_t('Edit'));
        $action1->setImage('far:edit blue');
        $action1->setField('id');
        
        
        $action2 = new TDataGridAction(array($this, 'onDelete'));
        //$action2->setUseButton(TRUE);
        $action2->setButtonClass('btn btn-default');
        $action2->setLabel(_t('Delete'));
        $action2->setImage('far:trash-alt red');
        $action2->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->style = 'box-shadow: 0 0px 0px rgb(0 0 0 / 0%); border: 0px solid rgba(0,0,0,.125)';
        //$panel->addFooter($this->pageNavigation);
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        //$container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
    }

           /**
     * Close side panel
     */
    public static function onClose($param)
    {
        TScript::create("Template.closeRightPanel()");
    }

    // method onSave
    // Executed whenever the user clicks at the save button
    
    public static function onSaveAreaDeAtuacao($param)
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('portal');
            
            
            // read the form data and instantiates an Active Record
            $area_atuacao = new CadastroAreaDeAtuacao;
            $area_atuacao->fromArray( $param );
            
                       
            // stores the object in the database
            $area_atuacao->store();
            
            $data = new stdClass;
            $data->id = $area_atuacao->id;
            TForm::sendData('form_AreasDeAtuacao', $data);
            
            
                //TScript::create("Template.closeRightPanel()");
    
                $posAction = new TAction(array('AreasDeAtuacaoFormList', 'onReload'));
                //$posAction->setParameter('target_container', 'adianti_div_content');
                
                // shows the success message
                new TMessage('info', 'Registro Salvo', $posAction);
 
            
            TTransaction::close(); // close the transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }



}
