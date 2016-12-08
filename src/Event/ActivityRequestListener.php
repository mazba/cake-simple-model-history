<?php
namespace CakeSimpleModelHistory\Event;

use ArrayObject;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Http\Client\Request;
use Cake\ORM\Entity;

/**
 * Class ActivityRequestListener
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
class ActivityRequestListener implements EventListenerInterface {

/**
 * @var AuthComponent
 */
	protected $_Auth;
/**
 * @var Request
 */
	protected $_request;

	/**
	 * Constructor
	 *
	 * @param \Cake\Controller\Component\AuthComponent $Auth Authcomponent
	 * @param Request $request
	 */
	public function __construct(AuthComponent $Auth,$request) {
		$this->_Auth = $Auth;
		$this->_request = $request;
	}

/**
 * {@inheritDoc}
 */
	public function implementedEvents() {
		return [
			'Model.beforeSave' => [
				'callable' => 'beforeSave',
				'priority' => -100
			]
		];
	}

/**
 * Before save listener.
 *
 * @param \Cake\Event\Event $event The beforeSave event that was fired
 * @param \Cake\ORM\Entity $entity The entity that is going to be saved
 * @param \ArrayObject $options the options passed to the save method
 * @return void
 */
	public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
		if (empty($options['mazba']['logged_in_user_id'])) {
			$options['mazba']['logged_in_user_id'] = $this->_Auth->user('id');
		}
		if (empty($options['mazba']['logged_in_user_group_id'])) {
			$options['mazba']['logged_in_user_group_id'] = $this->_Auth->user('user_group_id');
		}
		if (empty($options['mazba']['user_ip'])) {
			$options['mazba']['user_ip'] = $this->_request->clientIp();
		}
		$options['mazba']['user_input_data'] = $this->_request->data;
		$options['mazba']['url'] = $this->_request->url;
	}

}
