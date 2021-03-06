<?php
$this->Html->script('ace/bootstrap-tooltip.js', array('inline' => false));
$this->Html->css('recipes', array('inline' => false));

$this->Html->addCrumb('Receituário padrão');
if($recipe['Recipe']['status'])
    $this->Html->addCrumb('Receitas', '/recipes');
else{
    $this->Html->addCrumb('Receitas', '/recipes');
    $this->Html->addCrumb('Receitas desativadas', '/recipes/deleted_index');
}
$this->Html->addCrumb($recipe['Recipe']['name']);
?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#atributes">
                        <i class="green ace-icon fa fa-home bigger-120"></i>
                        Atributos &nbsp;
                    </a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#description">
                        Descrição &nbsp;
                    </a>
                </li>

                <li class="">
                    <a data-toggle="tab" href="#instructions">
                        Modo de preparo &nbsp;
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="atributes" class="tab-pane active">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Preparação </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_name"><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> C&oacute;digo </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_code"><?php echo h($recipe['Recipe']['code']); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Criado </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_created"><?php echo h(date("d-m-Y", strtotime($recipe['Recipe']['created']))); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Modificado </div>

                            <div class="profile-info-value">
                                <span class="" id="recipe_modified"><?php echo h(date("d-m-Y", strtotime($recipe['Recipe']['modified']))); ?>&nbsp;</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Status </div>

                            <div class="profile-info-value">
                                <span class="label label-sm <?php echo $class = ($recipe['Recipe']['status'] == 1) ? 'label-success':'label-danger';?>" id="recipe_status"><?php echo $status = ($recipe['Recipe']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Rendimento </div>

                            <div class="profile-info-value">
                                <span class="badge badge-purple" id="recipeIncome">
                                    <?php echo $recipe['Recipe']['income']; ?><small> pessoas</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="description" class="tab-pane">
                    <p><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</p>
                </div>

                <div id="instructions" class="tab-pane">
                    <p><?php echo h($recipe['Recipe']['instructions']); ?>&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="widget-container-col ui-sortable" style="min-height: 184px;">
            <!-- #section:custom/widget-box.options.transparent -->

            <!-- /section:custom/widget-box.options.transparent -->
            <div class="widget-box transparent" style="opacity: 1; z-index: 0;">
                <div class="widget-header">
                    <h4 class="widget-title lighter"> Ingredientes </h4>

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
                                <?php if (!empty($related)): ?>
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('quantity', 'Quantidade'); ?></th>
                                            <th><?php echo $this->Paginator->sort('measure_unit_id', 'Unidade'); ?></th>
                                            <th><?php echo $this->Paginator->sort('product_id', 'Produto'); ?></th>

                                            <?php if(!$recipe['Recipe']['status']): ?>
                                            <th class="actions"><?php echo __('Ações'); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($related as $related): ?>
                                        <tr>
                                            <td style="text-align: right"><?php echo $related['ProductsForRecipe']['quantity']; ?></td>
                                            <td><?php echo $this->Html->link($related['Product']['MeasureUnit']['name'], '/measure_units/index'); ?></td>
                                            <td><?php echo $this->Html->link($related['Product']['name'], '/products/view/'.$related['Product']['id']); ?></td>

                                            <?php if(!$recipe['Recipe']['status']): ?>
                                            <td class="actions">
                                                <div class="hidden-xs hidden-sm hidden-md btn-group">
                                                    <?php
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'ace-icon fa fa-pencil bigger-130')
                                                        ),
                                                        array(
                                                            'controller' => 'productsForRecipes',
                                                            'action' => 'edit',
                                                            $related['ProductsForRecipe']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-warning actions-tooltip tooltip-warning',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'editar ingrediente',
                                                            'data-trigger' => 'hover'
                                                        )
                                                    );
                                                    echo $this->Form->postlink(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'glyphicon glyphicon-trash')
                                                        ),
                                                        array(
                                                            'controller' => 'productsForRecipes',
                                                            'action' => 'delete',
                                                            $related['ProductsForRecipe']['id']
                                                        ),
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'btn btn-xs btn-danger actions-tooltip tooltip-error',
                                                            'data-toggle' => 'tooltip',
                                                            'data-placement' => 'top',
                                                            'title' => 'deletar ingrediente',
                                                            'data-trigger' => 'hover'
                                                        ),
                                                        __('Deseja mesmo deletar este ingrediente?')
                                                    );
                                                    ?>
                                                </div>
                                                <div class="hidden-lg">
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
                                                                            'class' => 'orange'
                                                                        )
                                                                    ),
                                                                    array(
                                                                        'controller' => 'productsForRecipes',
                                                                        'action' => 'edit',
                                                                        $related['ProductsForRecipe']['id']
                                                                    ),
                                                                    array(
                                                                        'escape' => false,
                                                                        'class' => 'actions-tooltip tooltip-warning',
                                                                        'data-toggle' => 'tooltip',
                                                                        'data-placement' => 'right',
                                                                        'title' => 'editar ingrediente',
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
                                                                        $this->Html->tag(
                                                                            'i',
                                                                            '',
                                                                            array('class' => 'glyphicon glyphicon-trash bigger-120')
                                                                        ),
                                                                        array(
                                                                            'class' => 'red'
                                                                        )
                                                                    ),
                                                                    array(
                                                                        'controller' => 'productsForRecipes',
                                                                        'action' => 'delete',
                                                                        $related['ProductsForRecipe']['id']
                                                                    ),
                                                                    array(
                                                                        'escape' => false,
                                                                        'class' => 'actions-tooltip tooltip-error',
                                                                        'data-toggle' => 'tooltip',
                                                                        'data-placement' => 'right',
                                                                        'title' => 'deletar ingrediente',
                                                                        'data-trigger' => 'hover'
                                                                    ),
                                                                    __('Deseja mesmo deletar este ingrediente?')
                                                                );
                                                                ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <h3 class="lighter smaller red">
                                        No momento ainda não há nenhum ingrediente adicionado a esta receita.
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dataTables_info recipes-list-info">
                                        <?php
                                        echo $this->Paginator->counter(array(
                                            'format' => __('Página {:page} de {:pages}, mostrando {:current} tuplas de {:count} totais, começando na tupla {:start}, terminando em {:end}.')
                                        ));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dataTables_paginate paging_bootstrap recipes-list-paging">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <h4 class="header smaller lighter blue"> Ações </h4>
        <div class="btn-group">
            <?php
            if($recipe['Recipe']['status']){
                echo $this->Form->postLink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-remove')
                    ).' Desativar receita',
                    array(
                        'controller' => 'Recipes',
                        'action' => 'logical_delete',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-inverse btn-recipes'
                    )
                );
            } elseif($related) {
                echo $this->Form->postLink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-ok')
                    ).' Ativar receita',
                    array(
                        'controller' => 'Recipes',
                        'action' => 'logical_delete',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-success btn-recipes'
                    )
                );
            }
            if(!$recipe['Recipe']['status']) {
                echo $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'glyphicon glyphicon-plus')
                    ).' Adicionar ingrediente',
                    array(
                        'controller' => 'ProductsForRecipes',
                        'action' => 'add_ingredient',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn btn-lg btn-inverse btn-recipes'
                    )
                );
            }
            echo $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'ace-icon fa fa-pencil')
                ).' Editar receita',
                array(
                    'controller' => 'Recipes',
                    'action' => 'edit',
                    $recipe['Recipe']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-lg btn-yellow btn-recipes'
                )
            );
            ?>
        </div>
        <div class="space"></div>
    </div>
</div>

<script>
    jQuery(function($) {
        $('.actions-tooltip').tooltip();
    });
</script>
