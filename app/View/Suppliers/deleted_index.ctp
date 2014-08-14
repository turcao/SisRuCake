<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 13/08/14
 * Time: 19:37
 */

$this->Html->script('ace/jquery.dataTables', array('inline' => false));
$this->Html->script('ace/jquery.dataTables.bootstrap', array('inline' => false));
$this->Html->script('suppliers_indexes', array('inline' => false));
?>

<div class="page-header">
    <h1>Fornecedores
        <small><i class="ace-icon fa fa-angle-double-right"></i></small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header" style="background-color: darkred">
            Lista de fornecedores desativados.
        </div>

        <!-- <div class="table-responsive"> -->

        <!-- <div class="dataTables_borderWrap"> -->
        <div>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">
                        <label class="position-relative">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('name', 'Nome fantasia'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('business_name', 'Razão social'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('code', 'Código'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('adress', 'Endereço'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('cnpj', 'CNPJ'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('contact', 'Contato'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('created', 'Criado'); ?>&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?>&nbsp;</th>
                    <th class="actions"><?php echo __('Actions'); ?>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['name']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['business_name']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['code']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['adress']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['cnpj']); ?>&nbsp;</td>
                        <td><?php echo h($supplier['Supplier']['contact']); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y", strtotime($supplier['Supplier']['created']))); ?>&nbsp;</td>
                        <td><?php echo h(date("d-m-Y", strtotime($supplier['Supplier']['modified']))); ?>&nbsp;</td>
                        <td class="actions">
                            <div class="hidden-xs action-buttons">
                                <?php
                                echo $this->Html->link(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-search-plus ')
                                    ),
                                    array(
                                        'action' => 'view',
                                        $supplier['Supplier']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'blue actions-tooltip tooltip-info bigger-130',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 'ver fornecedor',
                                        'data-trigger' => 'hover'
                                    )
                                );
                                echo $this->Form->postLink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'ace-icon fa fa-trash-o bigger-130')
                                    ),
                                    array(
                                        'action' => 'delete',
                                        $supplier['Supplier']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'red'
                                    ),
                                    __('Tem certeza que deseja deletar permanentemente o produto: %s?', $supplier['Supplier']['name'])
                                );
                                echo $this->Form->postlink(
                                    $this->Html->tag(
                                        'i',
                                        '',
                                        array('class' => 'glyphicon glyphicon-ok')
                                    ),
                                    array(
                                        'action' => 'logical_delete',
                                        $supplier['Supplier']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'btn btn-xs btn-success actions-tooltip tooltip-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => 'top',
                                        'title' => 're-ativar fornecedor',
                                        'data-trigger' => 'hover'
                                    ),
                                    __('Ao ser deletado este produto perderá qualquer informação sobre quantidade em estoque. Deseja continuar com a operação?', $supplier['Supplier']['id'])
                                );
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"> A&ccedil;&otilde;es </h3>
            <p>
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
                    array('class' => 'btn btn-lg btn-primary', 'escape' => false)
                );
                ?>
                <?php
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'fa fa-eye')
                    ).' Fornecedores ativos',
                    array(
                        'controller' => 'suppliers',
                        'action' => 'index'
                    ),
                    array('class' => 'btn btn-lg btn-inverse', 'escape' => false)
                );
                ?>
            </p>
        </div>
    </div>
</div>