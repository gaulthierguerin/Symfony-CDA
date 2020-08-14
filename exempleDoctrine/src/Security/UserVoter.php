<?php


namespace App\Security;

use App\Entity\User;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UserVoter extends Voter
{

    const EDIT = 'edit';

    /**
     * @param string $attribute
     * @param $user
     * @return bool
     */
    protected function supports(string $attribute, $user)
    {
        // l'attribut n'est pas dans la liste
        if (!in_array($attribute, [self::EDIT])) {
            return false;
        }
        // si $user n'est pas une instance de User => pas dans la liste des utilisateur
        if (!$user instanceof User) {
            return false;
        }
        // si retourne true, appel de voteOnAttribute()
        return true;    }

    /**
     * @param string $attribute
     * @param $user
     * @param TokenInterface $token
     * @return false
     */
    protected function voteOnAttribute(string $attribute, $user, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            //l'utilisateur doit être connecté, sinon accès refusé
            return false;
        }

        $utilisateur = $user;

        switch ($attribute) {
            case self::EDIT:
                return $user->getId() == $utilisateur->getId();
        }

        throw new \LogicException('This code should not be reached !');
    }
}