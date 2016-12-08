<?php

namespace CakeSimpleModelHistory\Controller;

use CakeSimpleModelHistory\Event\ActivityRequestListener;

/**
 * Class ActivityLogsTrait
 *
 */
trait ActivityLogsTrait {

/**
 * {@inheritDoc}
 */
//	public function initialize(){
//		parent::initialize();
//		echo '<pre>';print_r('$this');die;
//	}
	public function loadModel($modelClass = null, $type = 'Table') {
		$model = parent::loadModel($modelClass, $type);
		$listener = new ActivityRequestListener($this->Auth,$this->request);
		$model->eventManager()->attach($listener);
		return $model;
	}

} 