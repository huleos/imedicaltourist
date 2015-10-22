<div class="col-md-4 col-md-offset-4">
	<hr>
</div>
<br>
<br>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<p>
					
					<?php foreach ($query->result() as $row){ echo "{$row->first_name} {$row->last_name}";} ?>

				</p>
				

			</div>
		</div>
</div>
<br>
<div class="col-md-4 col-md-offset-4">
	<hr>
</div>