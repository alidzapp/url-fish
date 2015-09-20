<form name="form" novalidate>

	<div class="field">

		<label for="url">url<span>.</span>fish<span>/</span></label>

		<div class="input">
			<input type="text" ng-model="run.url" placeholder="your-url" name="url" id="url" required focus>
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

		<div class="notice" ng-show="false">{{}}</div>

	</div>

	<div class="field">
		
		<label for="password">Password</label>

		<div class="input">
			<input type="password" ng-model="run.password" placeholder="Choose password" name="password" id="password">
		</div>

		<div class="notice" ng-show="(form.password.$touched || form.content.$dirty) && form.password.$pristine">{{errors.password}}</div>

	</div>

	<div class="field">
		
		<label for="content">Content</label>

		<div class="input">
			<textarea ng-model="run.content" placeholder="Say something secret in 100 characters or less." name="content" id="content" required></textarea>
		</div>

		<div class="notice" ng-show="false">{{}}</div>

	</div>

	<div class="field submit">

		<button type="submit" ng-click="submit()">Fish</button>

	</div>

<form>
