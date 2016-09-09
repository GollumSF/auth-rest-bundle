<?php
namespace GollumSF\AuthRestBundle\Manager;

use EntityManager57c618951aebb_546a8d27f194334ee012bfe64f629947b07e4919\__CG__\Doctrine\ORM\EntityManager;
use GollumSF\AuthRestBundle\Entity\Repository\UserRepository;
use GollumSF\AuthRestBundle\Entity\UserInterface;

/**
 * UserManagerTrait
 *
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
trait UserManagerTrait {
	
	/**
	 * @var EntityManager
	 */
	private $em;
	
	/**
	 * @var string
	 */
	private $entityClass;
	
	public function setEntityClass($entityClass) {
		$this->entityClass = $entityClass;
	}
	
	public function setEntityManager(EntityManager $em) {
		$this->em = $em;
	}
	
	/**
	 * @return string
	 */
	public function getEntityClass() {
		return $this->entityClass;
	}
	
	/**
	 * @return EntityManager
	 */
	public function getEntityManager() {
		return $this->em;
	}
	
	/**
	 * @return UserRepository
	 */
	public function getRepository() {
		return $this->getEntityManager()->getRepository($this->getEntityClass());
	}
	
	/**
	 * @return UserInterface
	 */
	public function createUser() {
		$class = $this->getEntityClass();
		return new $class;
	}
	
	/**
	 * @return UserInterface
	 */
	public function findOneEnabledByEmail($email) {
		return $this->getRepository()->findOneEnabledByEmail($email);
	}
	
}