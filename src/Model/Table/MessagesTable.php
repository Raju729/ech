<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \App\Model\Table\ConvsTable|\Cake\ORM\Association\BelongsTo $Convs
 *
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MessagesTable extends Table
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

        $this->setTable('messages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('m_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Convs', [
            'foreignKey' => 'conv_id',
            'joinType' => 'INNER'
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
            ->integer('m_id')
            ->allowEmpty('m_id', 'create');

        $validator
            ->integer('status')
            ->allowEmpty('status');

//        $validator
//            ->integer('rid')
//            ->requirePresence('rid', 'create')
//            ->notEmpty('rid');
//
//        $validator
//            ->integer('sid')
//            ->requirePresence('sid', 'create')
//            ->notEmpty('sid');

//        $validator
//            ->scalar('name')
//            ->maxLength('name', 30)
//            ->requirePresence('name', 'create')
//            ->notEmpty('name');

        $validator
            ->scalar('m_body')
            ->maxLength('m_body', 500)
            ->requirePresence('m_body', 'create')
            ->notEmpty('m_body');

        $validator
            ->scalar('thumb_url')
            ->maxLength('thumb_url', 100)
            ->allowEmpty('thumb_url');

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
        //$rules->add($rules->existsIn(['conv_id'], 'Convs'));

        return $rules;
    }
}
