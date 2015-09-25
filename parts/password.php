<form name="form" novalidate>

	<div class="field">
		
		<label for="password">Password</label>

		<div class="input">
			<input type="password" ng-model="run.password" placeholder="Fill in password" name="password" id="password" focus>
		</div>

		<div class="notice" ng-show="notice('password')">{{message}}</div>

	</div>

	<div class="field submit">

		<button type="submit" ng-click="submit()">View</button>

		<div class="notice yellow" ng-show="notice('submit')">{{message}}</div>

	</div>

<form>
