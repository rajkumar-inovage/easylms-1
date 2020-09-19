<script>
const dateString = '<?php echo $dt_string; ?>';
const outputSelector = document.getElementById ('users-list');
const mark_attendance = (btn_id, member_id, att_status) => {
	var formURL = '<?php echo site_url ('coaching/attendance_actions/mark_attendance/'.$coaching_id); ?>/'+member_id+'/'+att_status+'/'+dateString;
	fetch (formURL, {
		method : 'POST',
	}).then (function (response) {
		return response.json ();
	}).then(function(result) {
		if (result.status == true) {
			$('#present'+member_id).addClass('btn-light').removeClass('btn-success');
			$('#leave'+member_id).addClass('btn-light').removeClass('btn-success');
			$('#absent'+member_id).addClass('btn-light').removeClass('btn-success');
			$('#'+btn_id).addClass('btn-success').removeClass('btn-light');
		}
	});
	return true;
}
$(document).ready (function () {
	$('#search-date').on ('change', function () {
		var date = $(this).val ();
		var url = '<?php echo site_url ('coaching/attendance/index/'.$coaching_id.'/'.$role_id.'/'.$status.'/'.$batch_id); ?>/'+date;
		$(location).attr('href', url);
	});
	// Change date
	$('#date').on ('change', function () {
		var string = $(this).val();
		var attendanceDateURL = '<?php echo site_url ('coaching/attendance_actions/get_attendance/'.$coaching_id.'/'); ?>' + string;
		$(this).trigger('blur');
		$('body').addClass('show-spinner');
		$('.btn.disabled').removeClass('btn-success btn-info btn-danger').addClass('btn-light');
		$('.btn.btn-light').addClass('disabled');
		fetch (attendanceDateURL, {
			method : 'GET',
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				$('body.show-spinner').removeClass('show-spinner');
				$('.btn.disabled').removeClass('disabled');
				dateString = result.date;
				Object.keys(result.attendance).forEach((member_id) => {
					if(result.attendance[member_id] !== null){
						var member_attendance = parseInt(result.attendance[member_id].attendance);
						switch(member_attendance){
							case 1:
								$(`#present${member_id}`).removeClass('btn-light').addClass('btn-success check');
							break;
							case 2:
								$(`#leave${member_id}`).removeClass('btn-light').addClass('btn-info check');
							break;
							case 3:
								$(`#absent${member_id}`).removeClass('btn-light').addClass('btn-danger check');
							break;
							default:
						}
						$('.btn.check').addClass('disabled').removeClass('check');
					}
			    });
			}
		});
	});
	$('#search-form').on('submit', e => {
		e.preventDefault ();
		var formData = new FormData(e.currentTarget);
		fetch ($(e.currentTarget).attr('action'), {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				var obj =  result.data;
				var i = 1;
				var output = '<table class="table">';
					output += '<thead>';
						output += '<tr>';
							output += '<th width="5%">';
								output += '<input id="checkAll" type="checkbox" onclick="check_all ()">';
							output += '</th>';
							output += '<th width="25%">Name</th>';
							output += '<th width="">Email</th>';
							output += '<th width="">Role</th>';
							output += '<th width="">Status</th>';
							output += '<th width="">Actions</th>';
						output += '</tr>';
					output += '</thead>';
					output += '<tbody>';
					for (var item in obj) {
						output += '<tr>';
							output += '<td>';
								output += '<input type="checkbox" value="'+obj[item].member_id+'" class="checks">';
							output += '</td>';
							output += '<td>';
								var name = obj[item].first_name+' '+obj[item].last_name;
								output += '<a href="<?php echo site_url('coaching/users/create'); ?>/'+obj[item].coaching_id+'/'+obj[item].role_id+'/'+obj[item].member_id+'">'+name+'</a><br>';
								output += obj[item].adm_no;
							output += '</td>';
							output += '<td>';
								output += obj[item].email;
							output += '</td>';
							output += '<td>';
								output += obj[item].role_id;
							output += '</td>';
							output += '<td>';
								if (obj[item].status == 1) {
									output += '<span class="badge badge-primary">Active</span>';
								} else {
									output += '<span class="badge badge-light">Inactive</span>';
								}
							output += '</td>';
							output += '<td>';
							output += '</td>';
						output += '</tr>';
						i++;
					}
					output += '<tbody>';
				output += '</table>';
				/*
				/*
				*/
				outputSelector.innerHTML = output;
			}
		});
	});
});
</script>