<?php
class RememberFilter extends sfFilter
{
  public function execute ($filterChain)
  {
    // execute this filter only once
    if ($this->isFirstCall())
    {
      if ($cookie = $this->getContext()->getRequest()->getCookie('OpenEats'))
      {
        $value = unserialize(base64_decode($cookie));
        $c = new Criteria();
        $c->add(UserPeer::REMEMBER_KEY, $value[0]);
        $c->add(UserPeer::USER_LOGIN, $value[1]);
        $user = UserPeer::doSelectOne($c);
        if ($user)
        {
          // sign in
          $this->getContext()->getUser()->signIn($user);
        }
      }
    } 
    // execute next filter
    $filterChain->execute();
  }
}
?>