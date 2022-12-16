<?php

/**
 * OrgaosFormList
 *
 * @version    1.0
 * @package    control
 * @subpackage communication
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class OrgaosFormList extends TPage
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
        $this->setActiveRecord('CadastroOrgaos');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        // $this->setCriteria($criteria) // define a standard filter
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_CadastroOrgaos');
        $this->form->setFormTitle('Órgãos');
        $this->form->addHeaderActionLink( _t('Close'), new TAction([$this, 'onClose']), 'fa:times red');
        
        
        // create the form fields
        $id = new TEntry('id');
        $orgaos = new TEntry('orgaos');
        $id->setEditable(FALSE);

        // add the fields
        $this->form->addFields( [new TLabel('ID')], [$id] );
        $this->form->addFields( [new TLabel('Órgãos')], [$orgaos] );
        $id->setSize('30%');
        $orgaos->setSize('70%');
        $orgaos->addValidation("Órgãos", new TRequiredValidator()); 
        
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'far:save');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('Clear form'),  new TAction(array($this, 'onEdit')), 'fa:eraser red');
        
        // creates a DataGrid

        $detailDatagrid = new TQuickGrid;
        $detailDatagrid->disableHtmlConversion();
        $this->datagrid = new BootstrapDatagridWrapper($detailDatagrid);
        //$this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        $this->datagrid->disableDefaultClick();
      
     


        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'left', 50);
        $column_orgaos = new TDataGridColumn('orgaos', 'Órgãos', 'left');
      

        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_orgaos);

        
        // creates two datagrid actions
        $action1 = new TDataGridAction(array($this, 'onEdit'));
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
        $panel->addFooter($this->pageNavigation);
        
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
}
