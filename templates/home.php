<form name="run_form" novalidate>
	<label for="url">Pass<span>.</span>run<span>/</span></label>
	<input type="text" ng-model="run.url" name="url" id="url" required focus>
	<label for="password">Password</label>
	<input type="password" ng-model="run.password" name="password" id="password">
	<label for="content">Spill it</label>
	<textarea ng-model="run.content" name="content" id="content" required></textarea>
	<button type="submit" ng-click="run_submit()">Run it</button>
<form>

<p ng-show="(run_form.password.$touched || run_form.content.$dirty) && run_form.password.$pristine">{{errors.password}}</p>

<p ng-show="data" ng-class="type">{{data}}</p>