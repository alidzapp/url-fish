<form novalidate>
	<label for="url">Pass<span>.</span>run<span>/</span></label>
	<input type="text" ng-model="run.url" id="url" focus>
	<label for="password">Password</label>
	<input type="password" ng-model="run.password" id="password">
	<label for="content">Spill it</label>
	<textarea ng-model="run.content" id="content"></textarea>
	<button type="submit" ng-click="submit()">Run it</button>
<form>
