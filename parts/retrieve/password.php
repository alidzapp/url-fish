<form name="form" novalidate ng-init="auth.url='<?php echo $url; ?>'" ng-show="type != 'success'">

	<div class="field">
		
		<label for="password">Password</label>

		<div class="input">
			<input type="password" ng-model="auth.password" placeholder="Fill in password" name="password" id="password" required focus>
		</div>

		<div class="notice" ng-show="notice('password')">{{message}}</div>

	</div>

	<div class="field submit">

		<button type="submit" ng-click="submit('auth')">View</button>

		<div class="notice yellow" ng-show="notice('submit')">{{message}}</div>

	</div>

	<input type="hidden" ng-model="auth.url" name="url">

</form>

<div class="information secret" ng-show="type == 'success'" ng-bind-html="message"></div>

<?php require_once('../parts/loading.php'); ?>
