<?php $userdata = $this->session->userdata('user_data');
?>
<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Manage Registration</h1>
			<p class="description">Manage Your Registration</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1">
				<li>
					<a href="javascript:;"><i class="fa-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Manage Registration</strong>
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php  if($this->session->flashdata('success')) { ?>
				<div class="row-fluid">
					<div class="alert alert-success">
						<strong><?=$this->session->flashdata('success')?></strong> 
					</div>
				</div>
  			<?php } ?>
  			<?php  if($this->session->flashdata('error')) { ?>
				<div class="row-fluid">
					<div class="alert alert-danger">
						<strong><?=$this->session->flashdata('error')?></strong> 
					</div>
				</div>
  			<?php } ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Manage Registration</h3>
					  <div class="panel-options">
						<a href="<?php echo base_url(); ?>pms/pms/NewRegistration?menu=pms"><button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Add</span></button></a>
						<!-- <a href="<?php echo base_url(); ?>pms/pms/NewRegistration?menu=pms/track"><button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Show Notification</span></button></a> -->
					</div>	
				</div>
				<div class="panel-body">
					<script type="text/javascript">
						jQuery(document).ready(function($)
						{
							$("#example-1").dataTable({
								aLengthMenu: [
									[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
								]
							});
						});
					</script>
					  <div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
						<table id="example-1"  cellspacing="0" class="table table-small-font table-bordered table-striped">
							<thead>
								<tr>
									<th>S. Nunmber</th>
									<th>Employee Id</th>
									<th>Name</th>
									<th>Number</th>
									<th>Mobile IMEI</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. Nunmber</th>
									<th>Employee Id</th>
									<th>Name</th>
									<th>Number</th>
									<th>Mobile IMEI</th>
									<th>Status</th>
									<th>Action</th>
									
								</tr>
							</tfoot>
							<tbody>
							<?php $i=1; foreach($ApplicationRegistrationList as $list){ ?>
								<tr>
									<td><?=$i;?></td>
									<th><?php echo $list->employee_id;?></th>
									<td><?php echo $list->name;?></td>
									<td><?php echo $list->number;?></td>
									<td><?php echo $list->imei;?></td>
									<td><?php echo $list->status;?></td>
									<td>
										<?php if($list->status=='new') { ?>
											<a href="<?php echo base_url(); ?>pms/pms/ApiEmployeeRegistration/<?=$list->registration_id ?>"  data-toggle="tooltip" title="Create Employee" class="btn btn-secondary btn-sm btn-icon icon-left" ><i class="fa-plus"></i></a>
										<?php } if($list->status=='Disable') { ?>
											<a href="<?php echo base_url(); ?>pms/pms/EmployeeTrackStatus/<?=$list->registration_id ?>"  data-toggle="tooltip" title="Enable Employee Track" class="btn btn-secondary btn-sm btn-icon icon-left" ><i class="fa-check"></i></a>
										<?php } if($list->status=='Enable') { ?>
											<a href="<?php echo base_url(); ?>pms/pms/EmployeeTrackStatus/<?=$list->registration_id ?>"  data-toggle="tooltip" title="Disable Employee Track" onClick="return confirm('Are you sure You Want To Disable Tracking For This Employee.')" class="btn btn-secondary btn-sm btn-icon icon-left" ><i class="fa-close"></i></a>
										<?php } ?>
										<a href="<?php echo base_url(); ?>pms/pms/NewRegistration/<?=$list->registration_id ?>" data-toggle="tooltip" title="Edit Employee" class="btn btn-danger btn-sm btn-icon icon-left" ><i class="fa-pencil" ></i> </a>
										<a href="javascript:;" data-toggle="tooltip" title="Delete Employee" onClick="return confirm('Are you sure to delete this Employee Data ? This will delete all the related records on this organization as well.')" title="<?=$list->status;?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-trash"></i></a>
										<?php if($list->status!=='new') { $name=str_replace(' ', '_',$list->name);?>
										<a href="<?php echo base_url(); ?>pms/pms/excell_location/<?=$list->imei ?>/<?php echo $name;?>"  title="Genrate Tracksheat" data-toggle="modal" data-target="#modal-8" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa-download"></i></a>
										<a href="<?php echo base_url(); ?>pms/pms/location_map/<?=$list->imei ?>/<?php echo $name;?>?menu=pms" data-toggle="tooltip" title="Last Location" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-map-marker"></i></a>
										<?php } ?>
										<!--  <a href="<?php echo base_url(); ?>employee/ApprovalTrack/<?=$list->imei;?>/<?=$list->trackStatus;?>"  class="btn btn-danger btn-sm btn-icon icon-left">
												<?php echo $list->trackStatus; ?>
										</a>-->
									</td>
								</tr>
							<?php $i++; } ?>
							</tbody>
						</table>
					  </div>	
				</div>
			</div>
		</div>
	</div>