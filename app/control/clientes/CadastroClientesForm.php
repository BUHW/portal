<?php

class CadastroClientesForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'portal';
    private static $activeRecord = 'CadastroClientes';
    private static $primaryKey = 'id';
    private static $formName = 'form_CadastroClientesForm';

    use BuilderMasterDetailTrait;
    use BuilderMasterDetailFieldListTrait;

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);
        // define the form title
        $this->form->setFormTitle("Cadastro de Clientes");


        $id = new THidden('id');
        $situacao = new TCombo('situacao');
        $numero_klgama = new TEntry('numero_klgama');
        $razao_social = new TEntry('razao_social');
        $cnpj_cpf = new TEntry('cnpj_cpf');
        $area_atuacao = new TDBCombo('area_atuacao', 'portal', 'CadastroAreaDeAtuacao', 'id', '{area_atuacao}','id asc'  );
        $button_AddAreaAtuacao = new TButton('$button_AddAreaAtuacao');
        $representante = new TEntry('representante');
        $cpf_rep = new TEntry('cpf_rep');
        $dt_nasci = new TDate('dt_nasci');
        $cep = new TEntry('cep');
        $estado = new TEntry('estado');
        $cidade = new TEntry('cidade');
        $bairro = new TEntry('bairro');
        $rua = new TEntry('rua');
        $num = new TEntry('num');
        $complemento = new TEntry('complemento');
        $data_inclusao = new TDateTime('data_inclusao');
        $contato_cliente_cadastro_clientes_id = new THidden('contato_cliente_cadastro_clientes_id[]');
        $contato_cliente_cadastro_clientes___row__id = new THidden('contato_cliente_cadastro_clientes___row__id[]');
        $contato_cliente_cadastro_clientes___row__data = new THidden('contato_cliente_cadastro_clientes___row__data[]');
        $contato_cliente_cadastro_clientes_nome_contato = new TEntry('contato_cliente_cadastro_clientes_nome_contato[]');
        $contato_cliente_cadastro_clientes_depto_contato = new TEntry('contato_cliente_cadastro_clientes_depto_contato[]');
        $contato_cliente_cadastro_clientes_fone_contato = new TEntry('contato_cliente_cadastro_clientes_fone_contato[]');
        $contato_cliente_cadastro_clientes_email_contato = new TEntry('contato_cliente_cadastro_clientes_email_contato[]');
        $this->fieldList_633b7a4f5ce80 = new TFieldList();
        $senhas_acessos_cadastro_clientes_id = new THidden('senhas_acessos_cadastro_clientes_id[]');
        $senhas_acessos_cadastro_clientes___row__id = new THidden('senhas_acessos_cadastro_clientes___row__id[]');
        $senhas_acessos_cadastro_clientes___row__data = new THidden('senhas_acessos_cadastro_clientes___row__data[]');
        $senhas_acessos_cadastro_clientes_orgao = new TDBCombo('senhas_acessos_cadastro_clientes_orgao[]', 'portal', 'CadastroOrgaos', 'id', '{orgaos}','id asc'  );
        $senhas_acessos_cadastro_clientes_usuario_orgao = new TEntry('senhas_acessos_cadastro_clientes_usuario_orgao[]');
        $senhas_acessos_cadastro_clientes_senha_orgao = new TEntry('senhas_acessos_cadastro_clientes_senha_orgao[]');
        $this->fieldList_636942947d5e5 = new TFieldList();
        $system_document_cliente_category_id = new TDBCombo('system_document_cliente_category_id','portal', 'SystemDocumentCategory', 'id', '{name}','name asc'  );
        $system_document_cliente_id = new THidden('system_document_cliente_id');
        $system_document_cliente_title = new TEntry('system_document_cliente_title');
        $button_adicionar_system_document_cliente = new TButton('button_adicionar_system_document_cliente');

        $this->fieldList_633b7a4f5ce80->addField(null, $contato_cliente_cadastro_clientes_id, []);
        $this->fieldList_633b7a4f5ce80->addField(null, $contato_cliente_cadastro_clientes___row__id, ['uniqid' => true]);
        $this->fieldList_633b7a4f5ce80->addField(null, $contato_cliente_cadastro_clientes___row__data, []);
        $this->fieldList_633b7a4f5ce80->addField(new TLabel("Nome", null, '14px', null), $contato_cliente_cadastro_clientes_nome_contato, ['width' => '25%']);
        $this->fieldList_633b7a4f5ce80->addField(new TLabel("Departamento", null, '14px', null), $contato_cliente_cadastro_clientes_depto_contato, ['width' => '25%']);
        $this->fieldList_633b7a4f5ce80->addField(new TLabel("Telefone", null, '14px', null), $contato_cliente_cadastro_clientes_fone_contato, ['width' => '25%']);
        $this->fieldList_633b7a4f5ce80->addField(new TLabel("E-mail", null, '14px', null), $contato_cliente_cadastro_clientes_email_contato, ['width' => '25%']);

        $this->fieldList_633b7a4f5ce80->width = '100%';
        $this->fieldList_633b7a4f5ce80->setFieldPrefix('contato_cliente_cadastro_clientes');
        $this->fieldList_633b7a4f5ce80->name = 'fieldList_633b7a4f5ce80';
        $this->fieldList_633b7a4f5ce80->class .= ' table-responsive';

        $this->criteria_fieldList_633b7a4f5ce80 = new TCriteria();

        $this->form->addField($contato_cliente_cadastro_clientes_id);
        $this->form->addField($contato_cliente_cadastro_clientes___row__id);
        $this->form->addField($contato_cliente_cadastro_clientes___row__data);
        $this->form->addField($contato_cliente_cadastro_clientes_nome_contato);
        $this->form->addField($contato_cliente_cadastro_clientes_depto_contato);
        $this->form->addField($contato_cliente_cadastro_clientes_fone_contato);
        $this->form->addField($contato_cliente_cadastro_clientes_email_contato);

        $this->fieldList_633b7a4f5ce80->setRemoveAction(null, 'fas:times #dd5a43', "Excluír");

        $this->fieldList_636942947d5e5->addField(null, $senhas_acessos_cadastro_clientes_id, []);
        $this->fieldList_636942947d5e5->addField(null, $senhas_acessos_cadastro_clientes___row__id, ['uniqid' => true]);
        $this->fieldList_636942947d5e5->addField(null, $senhas_acessos_cadastro_clientes___row__data, []);
        $this->fieldList_636942947d5e5->addField(new TLabel("Orgão", null, '14px', null), $senhas_acessos_cadastro_clientes_orgao, ['width' => '33%']);
        $this->fieldList_636942947d5e5->addField(new TLabel("Usuário", null, '14px', null), $senhas_acessos_cadastro_clientes_usuario_orgao, ['width' => '33%']);
        $this->fieldList_636942947d5e5->addField(new TLabel("Senha", null, '14px', null), $senhas_acessos_cadastro_clientes_senha_orgao, ['width' => '33%']);

        $this->fieldList_636942947d5e5->width = '100%';
        $this->fieldList_636942947d5e5->setFieldPrefix('senhas_acessos_cadastro_clientes');
        $this->fieldList_636942947d5e5->name = 'fieldList_636942947d5e5';
        $this->fieldList_636942947d5e5->class .= ' table-responsive';

        $this->criteria_fieldList_636942947d5e5 = new TCriteria();

        $this->form->addField($senhas_acessos_cadastro_clientes_id);
        $this->form->addField($senhas_acessos_cadastro_clientes___row__id);
        $this->form->addField($senhas_acessos_cadastro_clientes___row__data);
        $this->form->addField($senhas_acessos_cadastro_clientes_orgao);
        $this->form->addField($senhas_acessos_cadastro_clientes_usuario_orgao);
        $this->form->addField($senhas_acessos_cadastro_clientes_senha_orgao);

        $this->fieldList_636942947d5e5->setRemoveAction(null, 'fas:times #dd5a43', "Excluír");

        $situacao->addValidation("Situação", new TRequiredValidator()); 
        $numero_klgama->addValidation("Nº Klgama", new TRequiredValidator()); 
        $razao_social->addValidation("Razão Social", new TRequiredValidator()); 
        $cnpj_cpf->addValidation("CNPJ / CPF", new TRequiredValidator()); 
        $area_atuacao->addValidation("Área de Atuação", new TRequiredValidator()); 

        $situacao->addItems(["1"=>"Ativo","2"=>"Inativo"]);
        $situacao->setValue('1:Ativo');
        $situacao->setDefaultOption(false);
        $data_inclusao->setEditable(false);
        $button_adicionar_system_document_cliente->setAction(new TAction([$this, 'onAddDetailSystemDocumentCliente'],['static' => 1]), "Adicionar");
        $button_adicionar_system_document_cliente->addStyleClass('btn-default');
        $button_adicionar_system_document_cliente->setImage('fas:plus #2ecc71');

        $button_AddAreaAtuacao->setAction(new TAction(['AreasDeAtuacaoFormList','onReload']), '');
        $button_AddAreaAtuacao->addStyleClass('btn-default');
        $button_AddAreaAtuacao->setImage('fas:plus #4CAF50');


        $dt_nasci->setMask('dd/mm/yyyy');
        $data_inclusao->setMask('dd/mm/yyyy hh:ii');

        $dt_nasci->setDatabaseMask('yyyy-mm-dd');
        $data_inclusao->setDatabaseMask('yyyy-mm-dd hh:ii');

        $button_adicionar_system_document_cliente->id = '63601e74a80a7';

        $situacao->enableSearch();
        $area_atuacao->enableSearch();
        $system_document_cliente_category_id->enableSearch();
        $senhas_acessos_cadastro_clientes_orgao->enableSearch();

        $cep->setMaxLength(9);
        $rua->setMaxLength(255);
        $estado->setMaxLength(255);
        $cidade->setMaxLength(255);
        $bairro->setMaxLength(255);
        $cnpj_cpf->setMaxLength(18);
        $complemento->setMaxLength(255);
        $razao_social->setMaxLength(255);
        $representante->setMaxLength(255);

        $id->setSize(200);
        $cep->setSize('100%');
        $num->setSize('100%');
        $rua->setSize('100%');
        $estado->setSize('100%');
        $bairro->setSize('100%');
        $cidade->setSize('100%');
        $cpf_rep->setSize('100%');
        $cnpj_cpf->setSize('100%');
        $dt_nasci->setSize('100%');
        $situacao->setSize('100%');
        $data_inclusao->setSize(150);
        $complemento->setSize('100%');
        $razao_social->setSize('100%');
        $area_atuacao->setSize('100%');
        $numero_klgama->setSize('100%');
        $representante->setSize('100%');
        $system_document_cliente_id->setSize(200);
        $system_document_cliente_title->setSize('100%');
        $system_document_cliente_category_id->setSize('100%');
        $senhas_acessos_cadastro_clientes_orgao->setSize('100%');
        $senhas_acessos_cadastro_clientes_senha_orgao->setSize('100%');
        $contato_cliente_cadastro_clientes_nome_contato->setSize('100%');
        $contato_cliente_cadastro_clientes_fone_contato->setSize('100%');
        $senhas_acessos_cadastro_clientes_usuario_orgao->setSize('100%');
        $contato_cliente_cadastro_clientes_depto_contato->setSize('100%');
        $contato_cliente_cadastro_clientes_email_contato->setSize('100%');

        $this->form->appendPage("Geral");

        $this->form->addFields([new THidden('current_tab')]);
        $this->form->setTabFunction("$('[name=current_tab]').val($(this).attr('data-current_page'));");

        $row1 = $this->form->addFields([$id,new TLabel("Situação: *", null, '14px', null, '100%'),$situacao],[new TLabel("Nº Klgama: *", null, '14px', null, '100%'),$numero_klgama],[new TLabel("Razão Social: *", null, '14px', null, '100%'),$razao_social]);
        $row1->layout = [' col-sm-2',' col-sm-2',' col-sm-8'];

        $row2 = $this->form->addFields([new TLabel("CNPJ / CPF: *", null, '14px', null, '100%'),$cnpj_cpf],[new TLabel("Área de Atuação: *", null, '14px', null, '100%'),$area_atuacao],[new TLabel("", null, '14px', null, '100%'),$button_AddAreaAtuacao]);
        $row2->layout =  [' col-sm-6','col-sm-5','col-sm-1'];

        $row3 = $this->form->addFields([new TLabel("Representante Legal:", null, '14px', null, '100%'),$representante],[new TLabel("CPF Representante:", null, '14px', null, '100%'),$cpf_rep],[new TLabel("Data de Nascimento:", null, '14px', null, '100%'),$dt_nasci]);
        $row3->layout = [' col-sm-6',' col-sm-4',' col-sm-2'];

        $row4 = $this->form->addContent([new TFormSeparator("Endereço", '#333', '18', '#eee')]);
        $row5 = $this->form->addFields([new TLabel("CEP:", null, '14px', null, '100%'),$cep],[new TLabel("Estado:", null, '14px', null, '100%'),$estado],[new TLabel("Cidade:", null, '14px', null, '100%'),$cidade]);
        $row5->layout = [' col-sm-3',' col-sm-3','col-sm-6'];

        $row6 = $this->form->addFields([new TLabel("Bairro:", null, '14px', null, '100%'),$bairro],[new TLabel("Rua:", null, '14px', null, '100%'),$rua],[new TLabel("Nº:", null, '14px', null, '100%'),$num]);
        $row6->layout = [' col-sm-5',' col-sm-5',' col-sm-2'];

        $row7 = $this->form->addFields([new TLabel("Complemento:", null, '14px', null, '100%'),$complemento]);
        $row7->layout = [' col-sm-10'];

        $row8 = $this->form->addContent([new TFormSeparator("Inclusão", '#333', '18', '#eee')]);
        $row9 = $this->form->addFields([new TLabel("Data de Inclusão:", null, '14px', null, '100%'),$data_inclusao]);
        $row9->layout = ['col-sm-6'];

        $this->form->appendPage("Contatos");
        $row10 = $this->form->addContent([new TFormSeparator("Contatos", '#333', '18', '#eee')]);
        $row11 = $this->form->addFields([$this->fieldList_633b7a4f5ce80]);
        $row11->layout = [' col-sm-12'];

        $this->form->appendPage("Acessos");
        $row12 = $this->form->addContent([new TFormSeparator("Acessos", '#333', '18', '#eee')]);
        $row13 = $this->form->addFields([$this->fieldList_636942947d5e5]);
        $row13->layout = [' col-sm-12'];

        $this->form->appendPage("Documentos");
        $row14 = $this->form->addContent([new TFormSeparator("Documentos", '#333', '18', '#eee')]);

        $this->detailFormSystemDocumentCliente = new BootstrapFormBuilder('detailFormSystemDocumentCliente');
        $this->detailFormSystemDocumentCliente->setProperty('style', 'border:none; box-shadow:none; width:100%;');

        $this->detailFormSystemDocumentCliente->setProperty('class', 'form-horizontal builder-detail-form');

        $row15 = $this->detailFormSystemDocumentCliente->addFields([new TLabel("Category id:", '#ff0000', '14px', null, '100%'),$system_document_cliente_category_id,$system_document_cliente_id],[new TLabel("Title:", '#ff0000', '14px', null, '100%'),$system_document_cliente_title]);
        $row15->layout = ['col-sm-6','col-sm-6'];

        $row16 = $this->detailFormSystemDocumentCliente->addFields([$button_adicionar_system_document_cliente]);
        $row16->layout = [' col-sm-12'];

        $row17 = $this->detailFormSystemDocumentCliente->addFields([new TFormSeparator("Detail", '#333', '18', '#eee')]);
        $row17->layout = [' col-sm-12'];

        $row18 = $this->detailFormSystemDocumentCliente->addFields([new THidden('system_document_cliente__row__id')]);
        $this->system_document_cliente_criteria = new TCriteria();

        $this->system_document_cliente_list = new BootstrapDatagridWrapper(new TDataGrid);
        $this->system_document_cliente_list->disableHtmlConversion();;
        $this->system_document_cliente_list->generateHiddenFields();
        $this->system_document_cliente_list->setId('system_document_cliente_list');
        $this->system_document_cliente_list->datatable = 'true';

        $this->system_document_cliente_list->disableDefaultClick();
        $this->system_document_cliente_list->style = 'width:100%';
        $this->system_document_cliente_list->class .= ' table-bordered';

        $column_system_document_cliente_category_name = new TDataGridColumn('category->name', "Pasta", 'left' , '60%');
        $column_system_document_cliente_title_transformed = new TDataGridColumn('title', "Link", 'left' , '30%');

        $column_system_document_cliente__row__data = new TDataGridColumn('__row__data', '', 'center');
        $column_system_document_cliente__row__data->setVisibility(false);

        $action_onEditDetailSystemDocument = new TDataGridAction(array('CadastroClientesForm', 'onEditDetailSystemDocument'));
        $action_onEditDetailSystemDocument->setUseButton(false);
        $action_onEditDetailSystemDocument->setButtonClass('btn btn-default btn-sm');
        $action_onEditDetailSystemDocument->setLabel("Editar");
        $action_onEditDetailSystemDocument->setImage('far:edit #478fca');
        $action_onEditDetailSystemDocument->setFields(['__row__id', '__row__data']);

        $this->system_document_cliente_list->addAction($action_onEditDetailSystemDocument);
        $action_onDeleteDetailSystemDocument = new TDataGridAction(array('CadastroClientesForm', 'onDeleteDetailSystemDocument'));
        $action_onDeleteDetailSystemDocument->setUseButton(false);
        $action_onDeleteDetailSystemDocument->setButtonClass('btn btn-default btn-sm');
        $action_onDeleteDetailSystemDocument->setLabel("Excluir");
        $action_onDeleteDetailSystemDocument->setImage('fas:trash-alt #dd5a43');
        $action_onDeleteDetailSystemDocument->setFields(['__row__id', '__row__data']);

        $this->system_document_cliente_list->addAction($action_onDeleteDetailSystemDocument);

        $this->system_document_cliente_list->addColumn($column_system_document_cliente_category_name);
        $this->system_document_cliente_list->addColumn($column_system_document_cliente_title_transformed);

        $this->system_document_cliente_list->addColumn($column_system_document_cliente__row__data);

        $this->system_document_cliente_list->createModel();
        $this->detailFormSystemDocumentCliente->addContent([$this->system_document_cliente_list]);

        $column_system_document_cliente_title_transformed->setTransformer(function($value, $object, $row) 
        {
            $value = explode(',', $value);
            if(count($value) == 0)
            {
                $value = $value[0];
            }

            if(is_array($value))
            {
                $files = $value;
                $divFiles = new TElement('div');
                foreach($files as $file)
                {
                    $fileName = $file;
                    if (strpos($file, '%7B') !== false) 
                    {
                        if (!empty($file)) 
                        {
                            $fileObject = json_decode(urldecode($file));

                            $fileName = $fileObject->fileName;
                        }
                    }

                    $a = new TElement('a');
                    $a->href = $fileName;
                    $a->class = 'btn btn-link';
                    $a->add($fileName);
                    $a->target = '_blank';

                    $divFiles->add($a);

                }

                return $divFiles;
            }
            else
            {
                if (strpos($value, '%7B') !== false) 
                {
                    if (!empty($value)) 
                    {
                        $value_object = json_decode(urldecode($value));
                        $value = $value_object->fileName;
                    }
                }

                if($value)
                {
                    $a = new TElement('a');
                    $a->href = "download.php?file={$value}";
                    $a->class = 'btn btn-default';
                    $a->add($value);
                    $a->target = '_blank';

                    return $a;
                }

                return $value;
            }
        });        $row19 = $this->form->addFields([$this->detailFormSystemDocumentCliente]);
        $row19->layout = ['col-sm-12'];

        $this->form->appendPage("Programação");
        $row20 = $this->form->addFields([new TLabel("Rótulo:", null, '14px', null)],[],[]);
        $row20->layout = ['col-sm-3','col-sm-3','col-sm-6'];

        $this->form->appendPage("Avaliações");
        $row21 = $this->form->addFields([new TLabel("Rótulo:", null, '14px', null)],[]);

        // create the form actions
        $btn_onsave = $this->form->addAction("Salvar", new TAction([$this, 'onSave'],['static' => 1]), 'fas:save #ffffff');
        $this->btn_onsave = $btn_onsave;
        $btn_onsave->addStyleClass('btn-primary'); 

        $btn_onshow = $this->form->addAction("Voltar", new TAction(['ClientesList', 'onShow']), 'fas:arrow-left #000000');
        $this->btn_onshow = $btn_onshow;

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Clientes","Cadastro de Cliente"]));
        }
        $container->add($this->form);

        parent::add($container);

    }

    public  function onAddDetailSystemDocumentCliente($param = null) 
    {
        try
        {
            $data = $this->form->getData();

            $errors = [];
            $requiredFields = [];
            $requiredFields[] = ['label'=>"Category id", 'name'=>"system_document_cliente_category_id", 'class'=>'TRequiredValidator', 'value'=>[]];
            $requiredFields[] = ['label'=>"Title", 'name'=>"system_document_cliente_title", 'class'=>'TRequiredValidator', 'value'=>[]];
            foreach($requiredFields as $requiredField)
            {
                try
                {
                    (new $requiredField['class'])->validate($requiredField['label'], $data->{$requiredField['name']}, $requiredField['value']);
                }
                catch(Exception $e)
                {
                    $errors[] = $e->getMessage() . '.';
                }
             }
             if(count($errors) > 0)
             {
                 throw new Exception(implode('<br>', $errors));
             }

            $__row__id = !empty($data->system_document_cliente__row__id) ? $data->system_document_cliente__row__id : 'b'.uniqid();

            TTransaction::open(self::$database);

            $grid_data = new SystemDocument();
            $grid_data->__row__id = $__row__id;
            $grid_data->category_id = $data->system_document_cliente_category_id;
            $grid_data->id = $data->system_document_cliente_id;
            $grid_data->title = $data->system_document_cliente_title;

            $__row__data = array_merge($grid_data->toArray(), (array)$grid_data->getVirtualData());
            $__row__data['__row__id'] = $__row__id;
            $__row__data['__display__']['category_id'] =  $param['system_document_cliente_category_id'] ?? null;
            $__row__data['__display__']['id'] =  $param['system_document_cliente_id'] ?? null;
            $__row__data['__display__']['title'] =  $param['system_document_cliente_title'] ?? null;

            $grid_data->__row__data = base64_encode(serialize((object)$__row__data));
            $row = $this->system_document_cliente_list->addItem($grid_data);
            $row->id = $grid_data->__row__id;

            TDataGrid::replaceRowById('system_document_cliente_list', $grid_data->__row__id, $row);

            TTransaction::close();

            $data = new stdClass;
            $data->system_document_cliente_category_id = '';
            $data->system_document_cliente_id = '';
            $data->system_document_cliente_title = '';
            $data->system_document_cliente__row__id = '';

            TForm::sendData(self::$formName, $data);
            TScript::create("
               var element = $('#63601e74a80a7');
               if(typeof element.attr('add') != 'undefined')
               {
                   element.html(base64_decode(element.attr('add')));
               }
            ");

        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }

    public static function onEditDetailSystemDocument($param = null) 
    {
        try
        {

            $__row__data = unserialize(base64_decode($param['__row__data']));
            $__row__data->__display__ = is_array($__row__data->__display__) ? (object) $__row__data->__display__ : $__row__data->__display__;

            $data = new stdClass;
            $data->system_document_cliente_category_id = $__row__data->__display__->category_id ?? null;
            $data->system_document_cliente_id = $__row__data->__display__->id ?? null;
            $data->system_document_cliente_title = $__row__data->__display__->title ?? null;
            $data->system_document_cliente__row__id = $__row__data->__row__id;

            TForm::sendData(self::$formName, $data);
            TScript::create("
               var element = $('#63601e74a80a7');
               if(!element.attr('add')){
                   element.attr('add', base64_encode(element.html()));
               }
               element.html(\"<span><i class='far fa-edit' style='color:#478fca;padding-right:4px;'></i>Editar</span>\");
               if(!element.attr('edit')){
                   element.attr('edit', base64_encode(element.html()));
               }
            ");

        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }
    public static function onDeleteDetailSystemDocument($param = null) 
    {
        try
        {

            $__row__data = unserialize(base64_decode($param['__row__data']));

            $data = new stdClass;
            $data->system_document_cliente_category_id = '';
            $data->system_document_cliente_id = '';
            $data->system_document_cliente_title = '';
            $data->system_document_cliente__row__id = '';

            TForm::sendData(self::$formName, $data);

            TDataGrid::removeRowById('system_document_cliente_list', $__row__data->__row__id);

        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }
    public function onSave($param = null) 
    {
        try
        {
            TTransaction::open(self::$database); // open a transaction

            $messageAction = null;

            $this->form->validate(); // validate form data

            $object = new CadastroClientes(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            $senhas_acessos_cadastro_clientes_items = $this->storeItems('SenhasAcessos', 'cadastro_clientes_id', $object, $this->fieldList_636942947d5e5, function($masterObject, $detailObject){ 

                //code here

            }, $this->criteria_fieldList_636942947d5e5); 

            $system_document_cliente_items = $this->storeMasterDetailItems('SystemDocument', 'cliente_id', 'system_document_cliente', $object, $param['system_document_cliente_list___row__data'] ?? [], $this->form, $this->system_document_cliente_list, function($masterObject, $detailObject){ 

                //code here

            }, $this->system_document_cliente_criteria); 

            $contato_cliente_cadastro_clientes_items = $this->storeItems('ContatoCliente', 'cadastro_clientes_id', $object, $this->fieldList_633b7a4f5ce80, function($masterObject, $detailObject){ 

                //code here

            }, $this->criteria_fieldList_633b7a4f5ce80); 

            // get the generated {PRIMARY_KEY}
            $data->id = $object->id; 

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            TToast::show('success', "Registro salvo", 'bottomCenter', 'far:check-circle'); 

            TForm::sendData(self::$formName, (object)['id' => $object->id]);

        }
        catch (Exception $e) // in case of exception
        {
            //</catchAutoCode> 

            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open(self::$database); // open a transaction

                $object = new CadastroClientes($key); // instantiates the Active Record 

                $this->fieldList_636942947d5e5_items = $this->loadItems('SenhasAcessos', 'cadastro_clientes_id', $object, $this->fieldList_636942947d5e5, function($masterObject, $detailObject, $objectItems){ 

                    //code here

                }, $this->criteria_fieldList_636942947d5e5); 

                $system_document_cliente_items = $this->loadMasterDetailItems('SystemDocument', 'cliente_id', 'system_document_cliente', $object, $this->form, $this->system_document_cliente_list, $this->system_document_cliente_criteria, function($masterObject, $detailObject, $objectItems){ 

                    //code here

                }); 

                $this->fieldList_633b7a4f5ce80_items = $this->loadItems('ContatoCliente', 'cadastro_clientes_id', $object, $this->fieldList_633b7a4f5ce80, function($masterObject, $detailObject, $objectItems){ 

                    //code here

                }, $this->criteria_fieldList_633b7a4f5ce80); 

                $this->form->setData($object); // fill the form 

                TTransaction::close(); // close the transaction 
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(true);

        $this->fieldList_633b7a4f5ce80->addHeader();
        $this->fieldList_633b7a4f5ce80->addDetail( new stdClass );

        $this->fieldList_633b7a4f5ce80->addCloneAction(null, 'fas:plus #69aa46', "Adicionar Novo");

        $this->fieldList_636942947d5e5->addHeader();
        $this->fieldList_636942947d5e5->addDetail( new stdClass );

        $this->fieldList_636942947d5e5->addCloneAction(null, 'fas:plus #69aa46', "Adicionar Novo");

    }

    public function onShow($param = null)
    {
        $this->fieldList_633b7a4f5ce80->addHeader();
        $this->fieldList_633b7a4f5ce80->addDetail( new stdClass );

        $this->fieldList_633b7a4f5ce80->addCloneAction(null, 'fas:plus #69aa46', "Adicionar Novo");

        $this->fieldList_636942947d5e5->addHeader();
        $this->fieldList_636942947d5e5->addDetail( new stdClass );

        $this->fieldList_636942947d5e5->addCloneAction(null, 'fas:plus #69aa46', "Adicionar Novo");

    } 

}

