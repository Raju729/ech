<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prescriptions Model
 *
 * @method \App\Model\Entity\Prescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prescription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrescriptionsTable extends Table
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

        $this->setTable('prescriptions');
        $this->setDisplayField('pres_id');
        $this->setPrimaryKey('pres_id');

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
//            ->integer('pres_id')
//            ->allowEmpty('pres_id', 'create');
//
//        $validator
//            ->integer('eid')
//            ->requirePresence('eid', 'create')
//            ->notEmpty('eid');
//
//        $validator
//            ->integer('pid')
//            ->requirePresence('pid', 'create')
//            ->notEmpty('pid');
//
//        $validator
//            ->integer('did')
//            ->requirePresence('did', 'create')
//            ->notEmpty('did');
//
//        $validator
//            ->scalar('did_info')
//            ->maxLength('did_info', 500)
//            ->requirePresence('did_info', 'create')
//            ->notEmpty('did_info');
//
//        $validator
//            ->scalar('eid_info')
//            ->maxLength('eid_info', 500)
//            ->requirePresence('eid_info', 'create')
//            ->notEmpty('eid_info');
//
//        $validator
//            ->scalar('pid_info')
//            ->maxLength('pid_info', 500)
//            ->requirePresence('pid_info', 'create')
//            ->notEmpty('pid_info');
//
//        $validator
//            ->scalar('pcommon_info')
//            ->maxLength('pcommon_info', 50)
//            ->requirePresence('pcommon_info', 'create')
//            ->notEmpty('pcommon_info');
//
//        $validator
//            ->scalar('pres_info')
//            ->maxLength('pres_info', 500)
//            ->requirePresence('pres_info', 'create')
//            ->notEmpty('pres_info');
//
//
//
//        $validator
//            ->integer('status')
//            ->requirePresence('status', 'create')
//            ->notEmpty('status');
//
//        $validator
//            ->dateTime('prescribe_date')
//            ->allowEmpty('prescribe_date');

        return $validator;
    }
}
