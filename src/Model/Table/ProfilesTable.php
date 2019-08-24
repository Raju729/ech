<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @method \App\Model\Entity\Profile get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Profile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profile findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('profiles');
        $this->setDisplayField('uid');
        $this->setPrimaryKey('uid');
        $this->addBehavior('Timestamp');

//        $this->addBehavior('Josegonzalez/Upload.Upload', [
//            'avatar' => [
//                'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}photo_dir{DS}'
//            ]
//        ]);
    }



    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('uid')
            ->allowEmpty('uid', 'create');

        $validator
            ->scalar('f_name')
            ->maxLength('f_name', 20,'First Name contain less than 20 character ')
            ->allowEmpty('f_name');

        $validator
            ->scalar('l_name')
            ->maxLength('l_name', 20,'Last Name contain less than 20 character ')
            ->allowEmpty('l_name');

        $validator
            ->scalar('specialist')
            ->maxLength('specialist', 200)
            ->allowEmpty('specialist');

        $validator
        ->scalar('mobile')
        ->maxLength('mobile', 20,'Mobile number contain less than 20 character ')
        ->allowEmpty('mobile');

        $validator
            ->scalar('alt_mobile')
            ->maxLength('alt_mobile', 11)
            ->allowEmpty('alt_mobile');

        $validator
            ->scalar('chamber')
            ->maxLength('chamber', 100)
            ->allowEmpty('chamber');

        $validator
            ->scalar('visittime')
            ->maxLength('visittime', 300)
            ->allowEmpty('visittime');

        $validator
            ->scalar('address')
            ->maxLength('address', 150)
            ->allowEmpty('address');

        $validator
            ->scalar('nid')
            ->maxLength('nid', 19,'NID contain less than 20 character ')
            ->allowEmpty('nid');

        $validator
            ->scalar('thumb_url')
            ->maxLength('thumb_url', 100)
            ->allowEmpty('thumb_url');

        $validator
            ->scalar('media_accounts')
            ->maxLength('media_accounts', 200)
            ->allowEmpty('media_accounts');

        return $validator;
    }
}
