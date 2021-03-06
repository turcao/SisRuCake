<?php

/*
 * @var $this view
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('measure_units', array('inline' => false));
$this->Html->css('measure-units', array('inline' => false));

$this->Html->addCrumb('Logística & Suprimentos');
$this->Html->addCrumb('Unidades de medida');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Unidades de medida cadastradas.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('id'); ?>&nbsp;</td>
                    <td><?php echo $this->Paginator->sort('name', 'Nome'); ?>&nbsp;</td>
                    <td><?php echo $this->Paginator->sort('int_only', 'Unitária'); ?>&nbsp;</td>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('created', 'Criado'); ?>&nbsp;</th>
                    <th class="hidden-sm hidden-xs"><?php echo $this->Paginator->sort('modified', 'Modificado'); ?>&nbsp;</th>
                    <th class="actions"><?php echo __('Ações'); ?>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($measureUnits as $measureUnit): ?>
                    <tr>
                        <td class="hidden-sm hidden-xs"><?php echo h($measureUnit['MeasureUnit']['id']); ?>&nbsp;</td>
                        <td><?php echo h($measureUnit['MeasureUnit']['name']); ?>&nbsp;</td>
                        <td>
                            <?php
                                if($measureUnit['MeasureUnit']['int_only'])
                                    echo $this->Html->tag(
                                        'span',
                                        $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-ok')),
                                        array(
                                            'class' => 'label label-sm label-success',
                                            'escape' => false
                                        )
                                    );
                                else
                                    echo $this->Html->tag(
                                        'span',
                                        $this->Html->tag('i', '',array('class' => 'glyphicon glyphicon-remove')),
                                        array(
                                            'class' => 'label label-sm label-inverse',
                                            'escape' => false
                                        )
                                    );
                            ?>&nbsp;
                        </td>
                        <td class="hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($measureUnit['MeasureUnit']['created']))); ?>&nbsp;</td>
                        <td class="hidden-sm hidden-xs"><?php echo h(date("d-m-Y", strtotime($measureUnit['MeasureUnit']['modified']))); ?>&nbsp;</td>
                        <td class="actions">
                            <div class=" btn-group">
                                <?php
                                echo $this->Form->postLink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-trash-o bigger-120')
                                    ),
                                    array(
                                        'action' => 'delete',
                                        $measureUnit['MeasureUnit']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-danger actions-tooltip tooltip-error',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'deletar unidade',
                                        'data-trigger' => 'hover'
                                    ),
                                    __("Esta ação apagará todos os produtos vinculados a '%s', deseja continuar?", $measureUnit['MeasureUnit']['name'])
                                );
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_info measure-units-list-info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="dataTables_paginate paging_bootstrap measure-units-list-paging">
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
                        'controller' => 'MeasureUnits',
                        'action' => 'add'
                    ),
                    array('class' => 'btn btn-lg btn-primary', 'escape' => false, 'style' => 'width: 240px;')
                );
                ?>
            </div>
            <div class="space"></div>
        </div>
    </div>
</div>
