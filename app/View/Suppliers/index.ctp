<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('suppliers_indexes', array('inline' => false));
$this->Html->css('suppliers', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Fornecedores');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Lista de fornecedores.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('name', 'Nome fantasia'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?>&nbsp;</th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('adress', 'Endereço'); ?>&nbsp;</th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('contact', 'Contato'); ?>&nbsp;</th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('created', 'Criado'); ?>&nbsp;</th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('qualification', 'Qualificação'); ?>&nbsp;</th>
                    <th class="actions"><?php echo __('Actions'); ?>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td class="hidden-sm hidden-xs"><?php echo h($supplier['Supplier']['name']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['code']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h($supplier['Supplier']['adress']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h($supplier['Supplier']['contact']); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($supplier['Supplier']['created']))); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs">
                            <?php
                                if($supplier['Supplier']['qualification']) {
                                    $qualify = $this->Html->tag(
                                        'i',
                                        $supplier['Supplier']['qualification'],
                                        array(
                                            'class' => 'actions-tooltip tooltip-default',
                                            'data-toggle' => 'tooltip',
                                            'title' => $supplier['Supplier']['comment'],
                                            'data-trigger' => 'hover'
                                        )
                                    );
                                } else {
                                    $qualify = $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-ban-circle'));
                                }
                                echo $qualify;
                            ?>&nbsp;
                        </td>
                        <td class="actions">
                            <div class="hidden-xs hidden-sm btn-group">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-pencil bigger-120')
                                    ),
                                    array(
                                        'action' => 'edit',
                                        $supplier['Supplier']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'editar fornecedor',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-remove')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $supplier['Supplier']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-inverse actions-tooltip tooltip-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'desativar fornecedor',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Ao ser desativado este fornecedor perderá qualquer informação sobre seus produtos. Deseja continuar com a operação?', $supplier['Supplier']['id'])
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
                                                    $this->Html->tag('i', '', array('class' => 'ace-icon fa fa-pencil bigger-130')),
                                                    array('class' => 'orange')
                                                ),
                                                array(
                                                    'action' => 'edit',
                                                    $supplier['Supplier']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-warning',
                                                    'data-toggle' => 'tooltip',
                                                    'data-placement' => 'top',
                                                    'title' => 'Editar Fornecedor',
                                                    'data-trigger' => 'hover'
                                                )
                                            );
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            echo $this->Form->postlink(
                                                $this->Html->tag(
                                                    'span',
                                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                                    array('class' => 'inverse')
                                                ),
                                                array(
                                                    'action' => 'logical_delete',
                                                    $supplier['Supplier']['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'actions-tooltip tooltip-default',
                                                    'data-toggle' => 'tooltip',
                                                    'data-placement' => 'top',
                                                    'title' => 'desativar fornecedor',
                                                    'data-trigger' => 'hover'
                                                ),
                                                __('Ao ser desativado este fornecedor perderá qualquer informação sobre seus produtos. Deseja continuar com a operação?', $supplier['Supplier']['id'])
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
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_info suppliers-list-info" id="sample-table-2_info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap suppliers-list-paging">
                        <ul class="pagination">
                            <?php
                            echo $this->Paginator->prev(
                                $this->Html->tag('i', '', array('class' => 'fa fa-angle-double-left')),
                                array(
                                    'tag' => 'li',
                                    'escape' => false,
                                ),
                                $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-angle-double-left')), '', array('escape' => false)),
                                array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false,)
                            );
                            echo $this->Paginator->numbers(array(
                                'separator' => '',
                                'tag' => 'li',
                                'currentClass' => 'active',
                                'currentTag' => 'a'
                            ));
                            echo $this->Paginator->next(
                                $this->Html->tag('i', '', array('class' => 'fa fa-angle-double-right')),
                                array(
                                    'tag' => 'li',
                                    'escape' => false,
                                ),
                                $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-angle-double-right')), '', array('escape' => false)),
                                array('class' => 'next disabled', 'tag' => 'li', 'escape' => false,)
                            );
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
            <div class="btn-group">
                <?php
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-plus')
                    ).' Novo',
                    array(
                        'controller' => 'suppliers',
                        'action' => 'add'
                    ),
                    array('class' => 'btn btn-lg btn-primary btn-suppliers', 'escape' => false)
                );
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'fa fa-bar-chart-o')
                    ).' Qualificar',
                    array(
                        'controller' => 'suppliers',
                        'action' => 'qualify'
                    ),
                    array('class' => 'btn btn-lg btn-warning btn-suppliers', 'escape' => false)
                );
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'fa fa-eye')
                    ).' Fornecedores desativados',
                    array(
                        'controller' => 'suppliers',
                        'action' => 'deleted_index'
                    ),
                    array('class' => 'btn btn-lg btn-inverse btn-suppliers', 'escape' => false)
                );
                ?>
            </div>
            <div class="space"></div>
        </div>
    </div>
</div>