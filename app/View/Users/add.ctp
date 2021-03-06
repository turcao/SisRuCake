<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 07/07/14
 * Time: 21:15
 */

$this->html->css('chosen', array('inline' => false));

$this->html->script('ace/chosen.jquery', array('inline' => false));
$this->Html->script('users_add', array('inline' => false));

$this->Html->addCrumb('Usuários', '/users');
$this->Html->addCrumb('Adicionar usuário');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Novo usuário</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="products form">
                        <?php echo $this->Form->create(
                            'User',
                            array(
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'inputDefaults' => array(
                                    'label' => false
                                ),
                                'type' => 'file'
                            )
                        ); ?>
                        <fieldset style="padding: 16px">

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserUsername"> Username </label>


                                <?php echo $this->Form->input(
                                    'User.username',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserPassword"> Senha </label>


                                <?php echo $this->Form->input(
                                    'User.password',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'password'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserFirstName"> Nome </label>

                                <?php echo $this->Form->input(
                                    'User.first_name',
                                    array(
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserLastName"> Sobrenome </label>


                                <?php echo $this->Form->input(
                                    'User.last_name',
                                    array(
                                        'div' => 'col-sm-9',
                                        'type' => 'text'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserRole"> Papel </label>


                                <?php echo $this->Form->input(
                                    'User.role',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserEmail"> Email </label>


                                <?php echo $this->Form->input(
                                    'User.email',
                                    array(
                                        'type' => 'text',
                                        'div' => 'col-sm-9'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserRestaurantId"> Unidade UNESP </label>


                                <?php echo $this->Form->input(
                                    'User.restaurant_id',
                                    array(
                                        'type' => 'select',
                                        'div' => 'col-sm-9',
                                        'class' => 'chosen-select',
                                        'placeholder' => 'escolha uma UAN'
                                    )
                                ); ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="UserRestaurantId"> Coloque sua melhor foto! </label>


                                <?php echo $this->Form->input(
                                    'User.image_url',
                                    array(
                                        'type' => 'file',
                                        'div' => 'col-sm-9'
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
