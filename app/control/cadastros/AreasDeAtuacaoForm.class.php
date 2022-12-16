<?php
/**
 * AreasDeAtuacaoForm
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AreasDeAtuacaoForm extends TWindow
{
     /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        parent::setSize(0.8, null);
        parent::removePadding();
        parent::removeTitleBar();
        parent::disableEscape();
        
        // with: 500, height: automatic
        parent::setSize(0.6, null); // use 0.6, 0.4 (for relative sizes 60%, 40%)
        
        // create the HTML Renderer
       
        // creates the form
        $this->form = new BootstrapFormBuilder('form_AreasDeAtuacao');
        $this->form->setFormTitle('Editar Área de Atuação');
        $this->form->addHeaderActionLink( _t('Close'), new TAction([$this, 'onClose']), 'fa:times red');
        
        // create the form fields
        $id = new TEntry('id');
        $area_atuacao= new TEntry('area_atuacao');
        
        // add the fields
        $this->form->addFields( [new THidden('Id')], [$id] );
        $this->form->addFields( [new TLabel('Área de Atuação')], [$area_atuacao] );
        
        //if (!empty($ini['general']['multi_database']) and $ini['general']['multi_database'] == '1')
        //{
        //    $database = new TCombo('connection_name');
        //    $database->addItems( SystemDatabaseInformationService::getConnections() );
        //    $this->form->addFields( [new TLabel(_t('Database'))], [$database] );
        //    $database->setSize('70%');
        //}
        
        $id->setEditable(FALSE);
        $id->setSize('30%');
        $area_atuacao->setSize('70%');
        $area_atuacao->addValidation(('Área de Atuação'), new TRequiredValidator );
        
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSaveAA')), 'far:save');
        $btn->class = 'btn btn-sm btn-primary';
       //$this->form->addActionLink(_t('Clear'),  new TAction(array($this, 'onEdit')), 'fa:eraser red');
        //$this->form->addActionLink(_t('Back'),new TAction(array('AreasDeAtuacaoList','onReload')),'far:arrow-alt-circle-left blue');
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        //$container->add(new TXMLBreadCrumb('menu.xml', 'AreasDeAtuacaoList'));
        $container->add($this->form);
        
        parent::add($container);










        
        //parent::add($this->html);            
    }

          /**
     * Close side panel
     */
    public static function onClose($param)
    {

        TWindow::closeWindow();

        
    }

    // method onSave
    // Executed whenever the user clicks at the save button
    
   public static function onSaveAA($param)
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
           
           
              // TScript::create("Template.closeRightPanel()");
              TWindow::closeWindow();
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

   public function onEdit($param)
   {
       //$this->form->setData( (object) TSession::getValue(__CLASS__) );
   }


}
