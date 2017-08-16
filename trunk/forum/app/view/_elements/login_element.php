<div class="formlogin">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="<?php echo url("user/login")?>">
        <p><input type="text" name="login" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p>
          <?php echo empty($forminfo['password']) ? '' : array_shift($forminfo['password']); ?>
        </p>
        <P>
          <?php echo isset($forminfo['loginmsg']) ? $forminfo['loginmsg'] :' '; ?>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
</div>