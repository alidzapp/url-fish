<form class="no-title" name="form" novalidate>

	<div class="field">

		<label for="url">url<span>.</span>fish<span>/</span></label>

		<div class="input">
			<input type="text" ng-model="new.url" placeholder="your-url" name="url" id="url" ng-maxlength="50" required focus>
		</div>

		<div class="notice" ng-show="notice('url')">{{message}}</div>

	</div>

	<div class="field options">
		
		<label for="8h">Duration</label>

		<div class="input">
			<button ng-class="active(1)" ng-click="duration(1)" id="1h">1h</button>
			<button ng-class="active(8)" ng-click="duration(8)" id="8h">8h</button>
			<button ng-class="active(24)" ng-click="duration(24)" id="24h">24h</button>
		</div>

		<div class="notice" ng-show="notice('duration')">{{message}}</div>

	</div>

	<div class="field">
		
		<label for="password">Password</label>

		<div class="input">
			<input type="password" ng-model="new.password" placeholder="Choose password (optional)" name="password" id="password">
		</div>

		<div class="notice yellow" ng-show="(form.password.$touched || form.content.$dirty) && form.password.$pristine && type != 'success'">{{errors.password}}</div>

		<div class="notice" ng-show="notice('password')">{{message}}</div>

	</div>

	<div class="field">
		
		<label for="content">Content</label>

		<div class="input">
			<textarea ng-model="new.content" placeholder="Say something secret in 100 characters or less." name="content" id="content" required></textarea>
		</div>

		<div class="notice" ng-show="notice('content')">{{message}}</div>

	</div>

	<div class="field submit">

		<button type="submit" ng-click="submit()">Fish</button>

		<div class="notice yellow" ng-show="notice('submit') && form.$pristine">
			{{message}}<br><br><a target="_blank" ng-href="http://url.fish/{{link}}">Visit URL</a>
		</div>

	</div>

</form>

<div ng-show="loading">

	<?php require_once('../parts/loading.php'); ?>
	
</div>
