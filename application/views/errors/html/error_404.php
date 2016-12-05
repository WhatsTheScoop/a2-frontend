<style>
#error-box {
	margin-top: 25px;
	padding-bottom: 25px;
}
</style>
<div id="error-box" class="alert alert-warning col-md-6 col-md-offset-3">
	<h1 class="text-center">{error_title}</h1>
	<p class="text-center">{error_message}</p>
	<br>
	<div class="text-center">
		<button onclick="location.href='{error_return_url}'" class="btn btn-info">Return</button>
	</div>
</div>

