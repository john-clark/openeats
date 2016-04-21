<p>Dear <?php echo $login; ?>, </p>

<p>A request for <?php echo $mail->getSubject() ?></p> was sent to this address.</p>

<p>For Security Reasons OpenEats does not store your password in clear text.
When you forget your password a random one is generated and sent to you</p>

<p>You can now login to OpenEats with:</p>

<p>
Login:  <strong><?php echo $login ?></strong><br />
Password: <strong><?php echo $password ?></strong>
</p>

<p>To login go to the <?php echo link_to('login page', 'user/login')?> 
and enter these credentials.</p>

<p>The OpenEats Staff</p>