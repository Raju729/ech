<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null, $options = [])
 */
class PatientsTable extends Table
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

        $this->setTable('patients');
        $this->setDisplayField('pid');
        $this->setPrimaryKey('pid');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
//        $validator
//            ->integer('pid')
//            ->allowEmpty('pid', 'create');
//
//        $validator
//            ->integer('uid')
//            ->requirePresence('uid', 'create')
//            ->notEmpty('uid');
//
//        $validator
//            ->scalar('f_name')
//            ->maxLength('f_name', 20)
//            ->requirePresence('f_name', 'create')
//            ->notEmpty('f_name');
//
//        $validator
//            ->scalar('l_name')
//            ->maxLength('l_name', 20)
//            ->requirePresence('l_name', 'create')
//            ->notEmpty('l_name');
//
//        $validator
//            ->scalar('dob')
//            ->maxLength('dob', 10)
//            ->requirePresence('dob', 'create')
//            ->notEmpty('dob');
//
//        $validator
//            ->integer('age')
//            ->requirePresence('age', 'create')
//            ->notEmpty('age');
//
//        $validator
//            ->scalar('gender')
//            ->maxLength('gender', 6)
//            ->requirePresence('gender', 'create')
//            ->notEmpty('gender');
//
//        $validator
//            ->scalar('m_status')
//            ->maxLength('m_status', 20)
//            ->requirePresence('m_status', 'create')
//            ->notEmpty('m_status');
//
//        $validator
//            ->scalar('occupation')
//            ->maxLength('occupation', 20)
//            ->requirePresence('occupation', 'create')
//            ->notEmpty('occupation');
//
//        $validator
//            ->scalar('religion')
//            ->maxLength('religion', 20)
//            ->requirePresence('religion', 'create')
//            ->notEmpty('religion');
//
//        $validator
//            ->scalar('nid')
//            ->maxLength('nid', 19)
//            ->requirePresence('nid', 'create')
//            ->notEmpty('nid');
//
//        $validator
//            ->scalar('mobile')
//            ->maxLength('mobile', 11)
//            ->requirePresence('mobile', 'create')
//            ->notEmpty('mobile');
//
//        $validator
//            ->scalar('address')
//            ->maxLength('address', 200)
//            ->requirePresence('address', 'create')
//            ->notEmpty('address');
//
//        $validator
//            ->scalar('thumb_url')
//            ->maxLength('thumb_url', 100)
//            ->requirePresence('thumb_url', 'create')
//            ->allowEmpty('thumb_url');
//
//        $validator
//            ->dateTime('created')
//            ->requirePresence('created', 'create')
//            ->allowEmpty('created');
//
//        $validator
//            ->dateTime('modified')
//            ->requirePresence('modified', 'create')
//            ->allowEmpty('modified');

        return $validator;
    }
}
