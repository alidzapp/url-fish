<form name="form" novalidate>
	<label for="url">Pass<span>.</span>run<span>/</span></label>
	<input type="text" ng-model="run.url" name="url" id="url" required focus>
	<button ng-class="active(1)" ng-click="duration(1)">1h</button>
	<button ng-class="active(8)" ng-click="duration(8)">8h</button>
	<button ng-class="active(24)" ng-click="duration(24)">24h</button>
	<label for="password">Password</label>
	<input type="password" ng-model="run.password" name="password" id="password">
	<label for="content">Spill it</label>
	<textarea ng-model="run.content" name="content" id="content" required></textarea>
	<button type="submit" ng-click="submit()">Run it</button>
<form>

<p ng-show="(form.password.$touched || form.content.$dirty) && form.password.$pristine">{{errors.password}}</p>

<p ng-show="data" ng-class="type">{{data}}</p>