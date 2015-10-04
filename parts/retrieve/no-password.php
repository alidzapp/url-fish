<?php
	// echo '<div class="information secret">' . nl2br($database->getContent($connection, $url)) . '</div>';

	// $database->remove($connection, $url);
?>

<form name="form" novalidate ng-init="auth.url='<?php echo $url; ?>'" ng-show="type != 'success'">

	<div class="field submit">

		<button type="submit" ng-click="submit('no-auth')">View</button>

		<div class="notice yellow" ng-show="notice('submit')">{{message}}</div>

	</div>

	<input type="hidden" ng-model="auth.url" name="url">

</form>

<div class="information secret" ng-show="type == 'success'" ng-bind-html="message"></div>
