<?php

class myLoginValidator extends sfValidator
{ 

  /**
   * Check that the user login is valid
   *
   * @param unknown_type $context
   * @param unknown_type $parameters
   * @return unknown
   */
  public function initialize($context, $parameters = null)
  {
    // initialize parent
    parent::initialize($context);
 
    // set defaults
    $this->getParameterHolder()->set('login_error', 'Invalid input');
 
    $this->getParameterHolder()->add($parameters);
 
    return true;
  }
 
  public function execute(&$value, &$error)
  {
    $password_param = $this->getParameterHolder()->get('password');
    $password = $this->getContext()->getRequest()->getParameter($password_param);
 
    $login = $value;
 
    // anonymous is not a real user
    if ($login == 'anonymous')
    {
      $error = $this->getParameterHolder()->get('login_error');
      return false;
    }
    //get the user object of the user login and if it exist compare the passwords
    $c = new Criteria();
    $c->add(UserPeer::USER_LOGIN, $login);
    $user = UserPeer::doSelectOne($c);
 
    // login exists?
    if ($user)
    {
      // password is OK?
      if (sha1($user->getPswdSalt().$password) == $user->getUserPswd())
      {
         $remember = $this->getContext()->getRequest()->getParameter('remember_me');
      	 sfContext::getInstance()->getUser()->signIn($user, $remember);
             
        return true;
      }
    }
 
    $error = $this->getParameterHolder()->get('login_error');
    return false;
  }
}

?>