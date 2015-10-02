<form name="form" novalidate ng-init="auth.url='<?php echo $url; ?>'">

	<div class="field">
		
		<label for="password">Password</label>

		<div class="input">
			<input type="password" ng-model="auth.password" placeholder="Fill in password" name="password" id="password" focus>
		</div>

		<div class="notice" ng-show="notice('password')">{{message}}</div>

	</div>

	<input type="hidden" ng-model="auth.url" name="url">

	<div class="field submit">

		<button type="submit" ng-click="submit()">View</button>

		<div class="notice yellow" ng-show="notice('submit')">{{message}}</div>

	</div>

<form>
