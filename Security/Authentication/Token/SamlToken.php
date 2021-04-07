<?php

namespace Hslavich\OneloginSamlBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class SamlToken extends AbstractToken implements SamlTokenInterface
{
    const IDP_NAME = 'saml_idp_name';

    public function getCredentials()
    {
        return null;
    }

    public function getIdpName()
    {
        return $this->getAttribute(self::IDP_NAME);
    }

    /**
     * @param string $idpName
     */
    public function setIdpName($idpName)
    {
        $this->setAttribute(self::IDP_NAME, $idpName);
    }
}
