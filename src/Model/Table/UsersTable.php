<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    //  public function beforeSave(Event $event)
    // {
    //     $entity = $event->getData('User');

    //     // Make a password for digest auth.
    //     $entity->digest_hash = DigestAuthenticate::password(
    //         $entity->username,
    //         $entity->password,
    //         env('192.168.1.100')
    //     );
    //     return true;
    // }
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('uid');
        $this->setPrimaryKey('uid');
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
        $validator
            ->integer('uid')
            ->allowEmpty('uid', 'create');

        $validator
            ->scalar('nice_name')
            ->maxLength('nice_name', 50)
            ->requirePresence('nice_name', 'create','Nice name is required' )
            ->notEmpty('nice_name');

        $validator
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create','User name is required')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Username is already exists']);

        $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->requirePresence('password', 'create','password is required')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Email is already exists']);


        $validator
            ->integer('type')
            ->allowEmpty('type');

//        $validator
//            ->integer('user_active')
//            ->requirePresence('user_active', 'create','user_active is required')
//            ->allowEmpty('user_active');
/*
        $validator
            ->scalar('permissions')
            ->maxLength('permissions', 500)
            ->requirePresence('permissions', 'create')
            ->notEmpty('permissions');
*/

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
