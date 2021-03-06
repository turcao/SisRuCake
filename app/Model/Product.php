<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Restaurant $Restaurant
 * @property MeasureUnit $MeasureUnit
 * @property Supplier $Supplier
 * @property ProductsForRecipe $ProductsForRecipe
 * @property SuppliesProduct $SuppliesProduct
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo não pode estar vazio.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Este campo deve conter apenas letras e números.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo não pode estar vazio.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Este código de produto já existe, tente outro.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
		),
		'load_min' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Apenas números neste campo.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'load_max' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Apenas números neste campo.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'load_stock' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Apenas números neste campo.',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Apenas valores booleanos.',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'restaurant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MeasureUnit' => array(
			'className' => 'MeasureUnit',
			'foreignKey' => 'measure_unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductsForRecipe' => array(
			'className' => 'ProductsForRecipe',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SuppliesProduct' => array(
			'className' => 'SuppliesProduct',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'ProductOutput' => array(
            'className' => 'ProductOutput',
            'foreignKey' => 'product_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
	);

/**
 *
 *  Change product state function
 *
 */
    public function updateStatus($id = null){
        $this->id = $id;
        $product = $this->find('first', array('conditions' => array('Product.id' => $id)));
        if($product['Product']['status']){
            $this->saveField('status', false);
            $this->saveField('load_stock', 0);
        }else
            $this->saveField('status', true);
        //this status been returned is a boolean retrieved before saveField
        return $product['Product']['status'];
    }

    public function findProductById($id = null){
        $options = array(
            'conditions' => array('Product.id' => $id),
            'contain' => array(
                'MeasureUnit' => array(
                    'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                ),
                'Restaurant' => array(
                    'fields' => array('Restaurant.id', 'Restaurant.name')
                ),
                'ProductOutput' => array(),
            )
        );
        return $this->find('all', $options);
    }
}
