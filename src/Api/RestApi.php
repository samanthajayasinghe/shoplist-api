<?php


namespace ShopList\Api;

abstract class RestApi {

    /**
     * @var OauthService
     */
    private $oAuthService = null;

    /**
     * @return null
     */
    public function getOAuthService() {
        return $this->oAuthService;
    }

    /**
     * @param OauthService $oAuthService
     */
    public function setOAuthService(OauthService $oAuthService) {
        $this->oAuthService = $oAuthService;
    }
}
