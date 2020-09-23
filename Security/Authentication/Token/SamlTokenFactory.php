<?php

namespace Hslavich\OneloginSamlBundle\Security\Authentication\Token;

use Hslavich\OneloginSamlBundle\Attributes\AttributesMapper;

class SamlTokenFactory implements SamlTokenFactoryInterface
{
    /**
     * @var AttributesMapper
     */
    private $attributesMapper;

    public function __construct(AttributesMapper $attributesMapper)
    {
        $this->attributesMapper = $attributesMapper;
    }

    /**
     * @inheritdoc
     */
    public function createToken($user, array $attributes, array $roles, $idpName)
    {
        $token = new SamlToken($roles);
        $token->setUser($user);
        $token->setAttributes($this->attributesMapper->resolveAttributes($idpName, $attributes));
        $token->setIdpName($idpName);

        return $token;
    }
}
