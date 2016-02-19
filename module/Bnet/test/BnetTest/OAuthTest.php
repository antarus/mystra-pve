<?php
namespace BnetTest;

use League\OAuth2\Client\Token\AccessToken;
use Bnet\OAuth;
use Bnet\Region;

class OAuthTest extends \PHPUnit_Framework_TestCase
{
    public function testGetBaseAuthorizationUrl()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/authorize', $oauth->getBaseAuthorizationUrl());
    }

    public function testGetBaseAccessTokenUrl()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/token', $oauth->getBaseAccessTokenUrl([]));
    }

    public function testGetUserDetailsUrl()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.api.battle.net/account/user/id?access_token=foobar', $oauth->getUserDetailsUrl($token));
    }
}
