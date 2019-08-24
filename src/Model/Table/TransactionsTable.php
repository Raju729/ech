<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\ReffsTable|\Cake\ORM\Association\BelongsTo $Reffs
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Reffs', [
            'foreignKey' => 'reff_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('token')
            ->maxLength('token', 600)
            ->allowEmpty('token');

        $validator
            ->scalar('uid')
            ->maxLength('uid', 11)
            ->allowEmpty('uid');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 11)
            ->allowEmpty('created_by');

        $validator
            ->scalar('details')
            ->maxLength('details', 100)
            ->allowEmpty('details');

        $validator
            ->integer('amount')
            ->allowEmpty('amount');

        $validator
            ->integer('trx_status')
            ->allowEmpty('trx_status');

        $validator
            ->scalar('trx_name')
            ->maxLength('trx_name', 10)
            ->allowEmpty('trx_name');

        $validator
            ->integer('refund_status')
            ->allowEmpty('refund_status');

        $validator
            ->scalar('type')
            ->maxLength('type', 11)
            ->allowEmpty('type');

        $validator
            ->integer('last_bal')
            ->allowEmpty('last_bal');

        $validator
            ->integer('cur_bal')
            ->allowEmpty('cur_bal');

        $validator
            ->scalar('reff_name')
            ->maxLength('reff_name', 11)
            ->allowEmpty('reff_name');

        $validator
            ->scalar('w_method')
            ->maxLength('w_method', 11)
            ->allowEmpty('w_method');

        $validator
            ->scalar('w_account')
            ->maxLength('w_account', 55)
            ->allowEmpty('w_account');

        $validator
            ->scalar('w_details')
            ->allowEmpty('w_details');

        $validator
            ->scalar('pay_method')
            ->maxLength('pay_method', 55)
            ->allowEmpty('pay_method');

        $validator
            ->scalar('pay_info')
            ->allowEmpty('pay_info');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['reff_id'], 'Reffs'));

        return $rules;
    }
}
