<?php
/*
* v_quota_evaluation_status.php
* Display v_add_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-7
*/  
?>
<style>
	.text {
		color : black;
	}
	.orange {
		background-color : orange;
		color : black;
		text-align : center;
	}
	.orange2 {
		background-color : #ffe4b3;
	}
	th {
		text-align : center;
	}
	.margin {
		margin-top: 8px;
	}
	.blue1 {
		background-color: gray;
		color: white;
	}
	.h7 {
		color: white;
	}
</style>

<div class="col-md-12">
	<div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2><font size = "5px"><b>Evaluation Status<b></font></h2>
			<div class="col-md-6">
			</div>
			<div class="col-md-2">
				<a data-toggle="modal" href="#quota" class="btn btn-info btn-label pull-right margin"><i class="ti ti-check"></i>QUOTA</a>
			</div>
				<a data-toggle="modal" href="#attendance" class="btn btn-info btn-label pull-right margin"><i class="ti ti-clipboard"></i>ATTENDANCE</a>
		</div>
		<div class="panel-body" style="">
			<div class = "row">
				<div class="col-md-3">
					<div class="info-tile info-tile-alt tile-success" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
						<div class="tile-icon"><i class="ti ti-thumb-up"></i></div>
						<div class="tile-heading"><span>Likes</span></div>
						<div class="tile-body"><span>345</span></div>
						<div class="tile-footer"><span class="text-success">+15.4%</span></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile info-tile-alt tile-warning" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
						<div class="tile-icon"><i class="ti ti-eye"></i></div>
						<div class="tile-heading"><span>Page Views</span></div>
						<div class="tile-body"><span>1600</span></div>
						<div class="tile-footer"><span class="text-danger">-7.6%</span></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile info-tile-alt tile-danger" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
						<div class="tile-icon"><i class="ti ti-check-box"></i></div>
						<div class="tile-heading"><span>Bugs Fixed</span></div>
						<div class="tile-body"><span>21</span></div>
						<div class="tile-footer"><span class="text-success">+10.4%</span></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile info-tile-alt tile-inverse" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
						<div class="tile-icon"><i class="ti ti-check-box"></i></div>
						<div class="tile-heading"><span>Bugs Fixed</span></div>
						<div class="tile-body"><span>21</span></div>
						<div class="tile-footer"><span class="text-success">+10.4%</span></div>
					</div>
				</div>
			</div>
			<br>
			<div class = "row">
				<div class="col-md-12">
					<div class="panel panel-midnightblue" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
						<div class="panel-heading">
							<h2><font size = "5px"><b>Data Tables<b></font></h2>
							<div class="panel-ctrls">
							</div>
						</div>
						<div class="panel-body no-padding">
							<div class="dataTables_wrapper form-inline no-footer" id="example_wrapper">
								<div class="row">
								</div>
								<table width="100%" class="table table-striped table-bordered dataTable no-footer" id="example" role="grid" aria-describedby="example_info" style="width: 100%;" cellspacing="0">
									<thead>
										<tr role="row">
											<th tabindex="0" class="sorting_asc" aria-controls="example" style="width: 179px;" aria-label="Rendering engine: activate to sort column ascending" aria-sort="ascending" rowspan="1" colspan="1">Rendering engine</th><th tabindex="0" class="sorting" aria-controls="example" style="width: 200px;" aria-label="Browser: activate to sort column ascending" rowspan="1" colspan="1">Browser</th>
											<th tabindex="0" class="sorting" aria-controls="example" style="width: 235px;" aria-label="Platform(s): activate to sort column ascending" rowspan="1" colspan="1">Platform(s)</th>
											<th tabindex="0" class="sorting" aria-controls="example" style="width: 151px;" aria-label="Engine version: activate to sort column ascending" rowspan="1" colspan="1">Engine version</th>
											<th tabindex="0" class="sorting" aria-controls="example" style="width: 107px;" aria-label="CSS grade: activate to sort column ascending" rowspan="1" colspan="1">CSS grade</th>
										</tr>
									</thead>
									<tbody>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="center">1</td>
											<td class="center">A</td>
										</tr>
										<tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="center">1.9</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA even" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="center">1.8</td>
											<td class="center">A</td>
										</tr><tr class="gradeA odd" role="row">
											<td class="sorting_1">Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="center">1.7</td>
											<td class="center">A</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>		
			</div>
			<!-- Modal -->
			<div class="modal fade" id="quota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header blue1" id = "">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h2 class="modal-title h7"><b>Quota</b></h2>
						</div>
						<div class="modal-body">
							<div class="panel panel-midnightblue" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);">
								<div class="panel-heading">
									<h2>&nbsp;</h2>
									<div class="col-md-6">
									</div> 	
									<div class="col-md-4">
									<select class="text form-control pull-right margin text" id="" >
										<option value="yearEndBonus">Select Position</option>
										<option value="yearEndBonus">All Position</option>
										<option value="yearEndBonus">Staff</option>
										<option value="yearEndBonus">Senior Staff</option>
										<option value="salaryIncrement">Manager</option>
									</select>	
									</div>
									<button class="btn-success btn pull-right margin">SUBMIT</button>
								</div>
								<div class="panel-body" style="">
									<table width ="100%">
										<tr>										
											<td width = "30%"><h4 class = "text"><b>Quota </b></h4></td>
											<td width = "10%"><h4 class = "text"><b>: </b></h4></td>
											<td><h4 class = "text"><b>Year End Bonus</b></h4></td>	
										</tr>
										<tr>
											<td><h4 class = "text"><b>Position: </b></h4></td>
											<td><h4 class = "text"><b>: </b></h4></td>
											<td><h4 class = "text"><b>Team Associates Above</b></h4></td>	
										</tr>
										<tr>
											<td><h4 class = "text"><b>First half year </b></h4></td>
											<td><h4 class = "text"><b>: </b></h4></td>
											<td><h4 class = "text"><b>26/03/2564 - 25/09/2564</b></h4></td>	
										</tr>	
									</table>
								</div>
							</div>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Modal -->
			<div class="modal fade" id="attendance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h2 class="modal-title">Attendance</h2>
						</div>
						<div class="modal-body">
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
	</div>
</div>

