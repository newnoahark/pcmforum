<div class="formlogin">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="<?php echo url("user/register")?>">
      	<p><input type="text" name="username" value="" placeholder="Username"></p>
      	<P>
      		<?php echo empty($forminfo['username']) ? '' : array_shift($forminfo['username']); ?>
      	</p>
      	<p><input type="text" name="account" value="" placeholder="account"></p>
      	<p>	
      		<?php echo empty($forminfo['account']) ? '' : array_shift($forminfo['account']); ?>
      	</p>
      	<p><input type="password" name="password" value="" placeholder="Password"></p>
      	<p>
      		<?php echo empty($forminfo['password']) ? '' : array_shift($forminfo['password']); ?>
      	</p>
        <p><input type="text" name="email" value="" placeholder="Email"></p>
        <p>
        	<?php echo empty($forminfo['email']) ? '' : array_shift($forminfo['email']); ?>
        </p>
        <p>
	        <select name="sex">
			  <option value="sex" style="display:none">sex</option>
			  <option value="gentleman">gentleman</option>
			  <option value="lady">lady</option>
			</select>
		</p>
		<p>
			<?php echo empty($forminfo['sex']) ? '' : array_shift($forminfo['sex']); ?>
		</p>
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="commit" value="register"></p>
      </form>
    </div>
</div>