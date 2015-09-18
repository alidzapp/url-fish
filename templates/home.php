<form name="form" novalidate>

	<div class="field">

		<div class="label">
			<label for="url">pass<span>.</span>run<span>/</span></label>
		</div>

		<div class="input">
			<input type="text" ng-model="run.url" placeholder="your-url" name="url" id="url" required focus>
		</div>

	</div>

	<div class="field options">
		
		<div class="label">
			<label for="8h">Duration</label>
		</div>

		<div class="input">
			<button ng-class="active(1)" ng-click="duration(1)" id="1h">1h</button>
			<button ng-class="active(8)" ng-click="duration(8)" id="8h">8h</button>
			<button ng-class="active(24)" ng-click="duration(24)" id="24h">24h</button>
		</div>

	</div>

	<div class="field">
		
		<div class="label">
			<label for="password">Password</label>
		</div>

		<div class="input">
			<input type="password" ng-model="run.password" placeholder="Choose password" name="password" id="password">
		</div>

		<div class="notice" ng-show="(form.password.$touched || form.content.$dirty) && form.password.$pristine">{{errors.password}}</div>

	</div>

	<div class="field">
		
		<div class="label">
			<label for="content">Spill it</label>
		</div>

		<div class="input">
			<textarea ng-model="run.content" placeholder="Here comes the content of this run" name="content" id="content" required></textarea>
		</div>

	</div>

	<div class="field submit">

		<button type="submit" ng-click="submit()">Run it</button>

		<div class="notice" ng-show="data" ng-class="type">{{data}}</div>

	</div>

<form>
