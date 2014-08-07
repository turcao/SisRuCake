<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('ace/fuelux.spinner', array('inline' => false));
$this->Html->script('products', array('inline' => false));


?>

<div class="page-header">
    <h1>Adicionar produto<small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo produto</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="products form">
                        <?php echo $this->Form->create(
                            'Product',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                )
                            )
                        ); ?>
                        <fieldset style="padding: 16px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductQuantity"> Nome </label>

                                <?php echo $this->Form->input(
                                    'Product.name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductDateOfEntryMonth"> Código </label>


                                <?php echo $this->Form->input(
                                    'Product.code',
                                    array(
                                        'div' => 'col-sm-9'

                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Estoque m&iacute;nimo </label>


                                <?php echo $this->Form->input(
                                    'Product.load_min',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Estoque m&aacute;ximo </label>


                                <?php echo $this->Form->input(
                                    'Product.load_max',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId">Estoque atual</label>


                                <?php echo $this->Form->input(
                                    'Product.load_stock',
                                    array(
                                        'div' => 'col-sm-9',
                                        'class' => 'input-mini',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId">Status</label>


                                <?php echo $this->Form->input(
                                    'Product.status',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Unidade UNESP </label>


                                <?php echo $this->Form->input(
                                    'Product.restaurant_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma UAN'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Unidade de medida </label>


                                <?php echo $this->Form->input(
                                    'Product.measure_unit_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma unidade'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="SuppliesProductSupplierId"> Fornecedor </label>


                                <?php echo $this->Form->input(
                                    'Product.supplier_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha um fornecedor'
                                    )
                                ); ?>

                            </div>

                        </fieldset>

                        <div class="form-actions center">
                            <?php echo $this->Form->button(
                                'adicionar &nbsp;'.$this->Html->tag(
                                    'i',
                                    '',
                                    array(
                                        'class' => '"ace-icon fa fa-arrow-right icon-on-right bigger-110'
                                    )
                                ),
                                array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-success',
                                    'escape' => false
                                )
                            ); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products form">

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units'), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit'), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products For Recipes'), array('controller' => 'products_for_recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products For Recipe'), array('controller' => 'products_for_recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies Products'), array('controller' => 'supplies_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplies Product'), array('controller' => 'supplies_products', 'action' => 'add')); ?> </li>
	</ul>
</div>