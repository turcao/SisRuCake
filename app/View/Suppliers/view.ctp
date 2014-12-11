<?php
$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('suppliers_view', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
if($supplier['Supplier']['status'])
    $this->Html->addCrumb('Fornecedores', '/suppliers');
else{
    $this->Html->addCrumb('Fornecedores', '/suppliers');
    $this->Html->addCrumb('Fornecedores desativados', '/suppliers/deleted_index');
}
$this->Html->addCrumb($supplier['Supplier']['name']);
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5">
        <h3 class="header smaller lighter blue"> Atributos </h3>
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Id'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_name"><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Nome fantasia'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_name"><?php echo h($supplier['Supplier']['name']); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Razão social'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_name"><?php echo h($supplier['Supplier']['business_name']); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Código'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_code"><?php echo h($supplier['Supplier']['code']); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Endereço'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_unit_measure"><?php echo h($supplier['Supplier']['adress']); ?>&nbsp;</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('CNPJ'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_created"><?php echo h($supplier['Supplier']['cnpj']); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Contato'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_created"><?php echo h($supplier['Supplier']['contact']); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Status'); ?> </div>

                <div class="profile-info-value">
                    <span class="label label-sm <?php echo $class = ($supplier['Supplier']['status'] == 1) ? 'label-success':'label-danger';?>" id="product_code"><?php echo $status = ($supplier['Supplier']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Criado'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_created"><?php echo h(date("d-m-Y", strtotime($supplier['Supplier']['created']))); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Modificado'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_modified"><?php echo h(date("d-m-Y", strtotime($supplier['Supplier']['modified']))); ?>&nbsp;</span>
                </div>
            </div>

        </div>

        <div class="space-6"></div>

        <?php if($supplier['Supplier']['qualification']) : ?>
        <div class="col-sm-7 infobox-container">

            <div class="infobox infobox-pink">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-cutlery"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $supplier['Supplier']['qualification']; ?></span>
                    <div class="infobox-content">Qualificação</div>
                </div>
            </div>

            <!-- /section:pages/dashboard.infobox.dark -->
        </div>

        <div class="space-6"></div>

        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> <?php echo __('Observação'); ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="product_name"><?php echo h($supplier['Supplier']['comment']); ?>&nbsp;</span>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 widget-container-col ui-sortable" style="min-height: 184px;">
        <!-- #section:custom/widget-box.options.transparent -->

        <!-- /section:custom/widget-box.options.transparent -->
        <div class="widget-box transparent" style="opacity: 1; z-index: 0;">
            <div class="widget-header">
                <h4 class="widget-title lighter"> Últimos produtos fornecidos por: <?php echo h($supplier['Supplier']['name']); ?>&nbsp; </h4>

                <div class="widget-toolbar no-border">
                    <a href="#" data-action="settings">
                        <i class="ace-icon fa fa-cog"></i>
                    </a>

                    <a href="#" data-action="reload">
                        <i class="ace-icon fa fa-refresh"></i>
                    </a>

                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <a href="#" data-action="close">
                        <i class="ace-icon fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">
                        <!-- <div class="table-responsive"> -->

                        <!-- <div class="dataTables_borderWrap"> -->
                        <div>
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
                                    <th><?php echo $this->Paginator->sort('quantity', 'Qtd.'); ?></th>
                                    <th><?php echo $this->Paginator->sort('measure_unit', 'Unidade'); ?></th>
                                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('price', 'Preço'); ?></th>
                                    <th><?php echo $this->Paginator->sort('date_of_entry', 'Data de entrada'); ?></th>
                                    <th class="actions"><?php echo __('Ações'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($suppliedProducts as $suppliedProduct): ?>
                                    <tr>
                                        <td class="hidden-sm hidden-xs"><?php echo h($suppliedProduct['Product']['name']); ?>&nbsp;</td>
                                        <td><?php echo h($suppliedProduct['Product']['code']); ?>&nbsp;</td>
                                        <td style="text-align: right"><?php echo h($suppliedProduct['SuppliesProduct']['quantity']); ?>&nbsp;</td>
                                        <td><?php echo h($suppliedProduct['Product']['MeasureUnit']['name']); ?>&nbsp;</td>
                                        <td class="hidden-sm hidden-xs"><?php
                                            $this->Number->addFormat('BRL', array('before' => 'R$', 'thousands' => '.', 'decimals' => ','));
                                            echo $this->Number->currency($suppliedProduct['SuppliesProduct']['price'], 'BRL');
                                            ?>&nbsp;
                                        </td>
                                        <td><?php echo h(date("d-m-Y", strtotime($suppliedProduct['SuppliesProduct']['date_of_entry']))); ?>&nbsp;</td>
                                        <td class="actions">
                                            <div class="hidden-xs hidden-sm btn-group">
                                                <?php
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'ace-icon fa fa-search-plus bigger-120')
                                                        ),
                                                        array(
                                                            'controller' => 'products',
                                                            'action' => 'view',
                                                            $suppliedProduct['Product']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-primary actions-tooltip tooltip-info',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'Ver Produto',
                                                            'data-trigger' => 'hover'
                                                        )
                                                    );
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'glyphicon glyphicon-plus')
                                                        ),
                                                        array(
                                                            'controller' => 'suppliesProducts',
                                                            'action' => 'add_load_stock',
                                                            $suppliedProduct['Product']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-success actions-tooltip tooltip-success',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'Adicionar Quantidade',
                                                            'data-trigger' => 'hover'
                                                        )
                                                    );
                                                ?>
                                            </div>
                                            <div class="hidden-lg hidden-md">
                                                <div class="inline position-relative">
                                                    <?php
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'ace-icon fa fa-cog icon-only bigger-110')
                                                        ),
                                                        '',
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-minier btn-primary dropdown-toggle',
                                                            'data-toggle' => 'dropdown',
                                                            'data-position' => 'auto'
                                                        )
                                                    );
                                                    ?>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <?php
                                                            echo $this->Html->link(
                                                                $this->Html->tag(
                                                                    'span',
                                                                    $this->Html->tag(
                                                                        'i',
                                                                        '',
                                                                        array('class' => 'ace-icon fa fa-pencil bigger-120')
                                                                    ),
                                                                    array(
                                                                        'class' => 'blue'
                                                                    )
                                                                ),
                                                                array(
                                                                    'controller' => 'Products',
                                                                    'action' => 'view',
                                                                    $suppliedProduct['Product']['id']
                                                                ),
                                                                array(
                                                                    'escape' => false,
                                                                    'class' => 'actions-tooltip tooltip-info',
                                                                    'data-rel' => 'tooltip',
                                                                    'data-original-title' => 'ver produto'
                                                                )
                                                            );
                                                            ?>
                                                        </li>

                                                        <li>
                                                            <?php
                                                            echo $this->Html->link(
                                                                $this->Html->tag(
                                                                    'span',
                                                                    $this->Html->tag(
                                                                        'i',
                                                                        '',
                                                                        array('class' => 'glyphicon glyphicon-plus bigger-120')
                                                                    ),
                                                                    array(
                                                                        'class' => 'green'
                                                                    )
                                                                ),
                                                                array(
                                                                    'controller' => 'SuppliesProducts',
                                                                    'action' => 'add_load_stock',
                                                                    $suppliedProduct['Product']['id']
                                                                ),
                                                                array(
                                                                    'escape' => false,
                                                                    'class' => 'actions-tooltip tooltip-success',
                                                                    'data-rel' => 'tooltip',
                                                                    'data-original-title' => 'adicionar quantidade'
                                                                )
                                                            );
                                                            ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h4 class="header smaller lighter blue"> Ações </h4>
        <p>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'ace-icon fa fa-pencil')
                ).' Editar fornecedor',
                array(
                    'action' => 'edit',
                    $supplier['Supplier']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-yellow'
                )
            );
            ?>
            &nbsp;
            <?php
            echo $this->Form->postlink(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'glyphicon glyphicon-remove')
                ).' Desativar fornecedor',
                array(
                    'action' => 'logical_delete',
                    $supplier['Supplier']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-inverse'
                ),
                __('Ao ser desativado este fornecedor perderá qualquer informação. Deseja continuar com a operação?')
            );
            ?>
        </p>
    </div>
</div>
