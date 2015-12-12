<div id="farmer" class="tab-pane fade in active">
		    <div class="col-md-12 menu-content">
				 <div class="col-md-1">
				    <i class="fa fa-search search_icon"></i>
				 </div>
				 <div class="col-md-2">
					<select data-placeholder="เลือกจังหวัด" class="form-control chosen-select" id="province_area" name="province">
					   <option value="49">กำแพงเพชร</option>
					   <option value="1">กรุงเทพ</option>
					</select>
			     </div>
				 <div class="col-md-2">
					<select data-placeholder="เลือกอำเภอ" class="form-control" id="aumphur_area" name="aumphur">
					<option value="0">เลือกอำเภอ</option>
					</select>
				</div>
				<div class="col-md-2">
					<select data-placeholder="เลือกตำบล" class="form-control" tabindex="3" id="district_area" name="district">
					   <option value="0">เลือกตำบล</option>
					</select>
		 		</div>
		    </div>
		    <div class="col-md-12 officer-main-content" style="display:block;" id="farmer_detail_area">
		    	<table class="table table-bordered">
		    	<button id="officer_add_farmer" type="button" class="btn btn-info btn-add">เพิ่มรายขื่อเกษตรกร</button>
				  <thead>
				  	<tr>
				  		<th width="5%">ลำดับ</th>
				  		<th width="20%">ชื่อ</th>
							<th width="13%">ตำแหน่ง</th>
				  		<th width="10%">เบอร์โทรศัพท์</th>
				  		<th width="20%">อีเมล์</th>
				  		<th width="25%">สังกัด</th>
				  		<th width="10%">ตัวเลือก</th>
				  	</tr>
				  </thead>
				  <tbody id="farmer_show_area">
					<tr>
						<td colspan="6">ไม่มีข้อมูล</td>
					</tr>
				  </tbody>
				</table>
		  	</div>
		  	<div class="col-md-12 officer-main-content" style="display:none;" id="farmer_add_area">
		  	<button id="officer_add_cancle_top_farmer" type="button" class="btn btn-danger btn-add">ยกเลิกการเพิ่มรายชื่อ</button>
		  	<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/officer/addProfile/commit')}}">
				<div class="panel-heading"><h2 class="head-col">เพิ่มข้อมูลเกษตรกร</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
					      <div class="col-md-2">
					        <select data-placeholder="คำนำหน้าชื่อ" class="form-control" name="prefix_id">
				            <option value="1">นาย</option>
				            <option value="2">นาง</option>
				            <option value="3">นางสาว</option>
				    		</select>
					      </div>
					      <div class="col-md-3">
					        <input type="text" class="form-control" id="text" placeholder="ชื่อ" data-validation="required" value="" name="fname">
					      </div>
					      <div class="col-md-3">
					        <input type="text" class="form-control" id="text" placeholder="นามสกุล" data-validation="required" value="" name="lname">
					      </div>
					      <div class="col-md-4">
					        <input type="text" class="form-control" id="text" placeholder="รหัสบัตรประชาชน" data-validation="number length" data-validation-length="13" data-validation-help="เช่น 1234567890123" value="" name="card_id">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-6">
					        <input type="text" class="form-control" id="text" placeholder="ที่อยู่" value="" name="address">
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกจังหวัด" class="form-control" id="add_province_area" name="province">
				            <option value="49">กำแพงเพชร</option>
				            <option value="1">กรุงเทพ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกอำเภอ" class="form-control" id="add_aumphur_area" name="aumphur">
					        <option value="0">เลือกอำเภอ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกตำบล" class="form-control" tabindex="3" id="add_district_area" name="district">
				            <option value="0">เลือกตำบล</option>
				    		</select>
					      </div>
					    </div>
							<div class="form-group">
					      <div class="col-md-6">
									<select data-placeholder="เลือกประเภทเกษตรกร" class="form-control" name="typeuser_profile">
							        <option value="3">เกษตรกร</option>
											<option value="4">เกษตรกรปราดเปรื่อง</option>
						    		</select>
					      </div>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลสมาชิก</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="community_offiecer">
								<label class="radio-inline"><input type="radio" name="optcommu" value="0" onclick="officer_hide_community()" checked="checked">ไม่เป็นสมาชิกศูนย์ข้าว</label>
								<label class="radio-inline"><input type="radio" name="optcommu" value="1" onclick="officer_show_community()">เป็นสมาชิกศูนย์ข้าว</label>
							</div>
						</div>
					</div>
					<div class="form-group" style="display:none;" id="officer_community">
					    <div class="col-md-4 col-sm-4 col-xs-4">
							<select data-placeholder="เลือกศูนย์ข้าว" class="form-control" id="add_farmer_farmercomunity_area" name="farmercomunity">
					        <option value="1">เลือกศูนย์ข้าว</option>
				    		</select>
					    </div>
					</div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลติดต่อ</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" data-validation="number length" data-validation-length="10" data-validation-help="เช่น 08123456789" value="">
					    </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="email" class="form-control" id="email" placeholder="อีเมล์" data-validation="email" data-validation-help="เช่น chowkaset@nectec.com" value="" name="email">
					    </div>
					    <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="text" class="form-control" id="email" placeholder="เฟสบุ้ก" data-validation-help="เช่น https://www.facebook.com/nectec" value="" name="facebook">
					    </div>
					</div>
					<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="submit" class="btn btn-success">ตกลง</button>
							<button type="button" class="btn btn-danger" id="officer_add_cancle_farmer">ยกเลิก</button>
						</div>
					</div>
				</div>
				</form>
		  	</div>
<!-- ////////////////////////////// -->
				<div class="col-md-12 officer-main-content" style="display:none;" id="div_farmer_show_area">
		  	<button id="officer_add_cancle_top_farmer" type="button" class="btn btn-danger btn-add officer_showarea_cancle_farmer">ยกเลิกดูข้อมูลเกษตรกร</button>
		  	<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/officer/addProfile/commit')}}">
				<div class="panel-heading"><h2 class="head-col">ข้อมูลเกษตรกร</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
					      <div class="col-md-4">
					        <label class="head_show">ชื่อ-นามสกุล : </label><p id="farmer_showarea_name"></p>
					      </div>
					      <div class="col-md-3">
									<label class="head_show">รหัสบัตรประชนชน : </label><p id="farmer_showarea_cardid"></p>
					      </div>
								<div class="col-md-3">
									<label class="head_show">ชื่อผู้ใช้ : </label><p id="farmer_showarea_urname"></p>
					      </div>
								<div class="col-md-2">
									<label class="head_show">รหัสผ่าน : </label><p id="farmer_showarea_password"></p>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-6">
										<label class="head_show">ที่อยู่ : </label><p  id="farmer_showarea_address"></p>
					      </div>
					    </div>
							<div class="form-group">
					      <div class="col-md-6">
									<label class="head_show">ตำแหน่ง : </label><p  id="farmer_showarea_typeuser"></p>
					      </div>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลสมาชิก</h2><hr></div>
				<div class="panel-body">
					    <div class="col-md-4 col-sm-4 col-xs-4">
								<label class="head_show">สมาชิก : </label><p  id="farmer_showarea_community"></p>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลติดต่อ</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
								<label class="head_show">เบอร์โทรศัพท์ : </label><p id="farmer_showarea_tel"></p>
					    </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					      <label class="head_show">อีเมล์ : </label><p id="farmer_showarea_email"></p>
					    </div>
					    <div class="col-md-4 col-sm-4 col-xs-4">
					      <label class="head_show">เฟสบุ๊ค : </label><p id="farmer_showarea_facebook"></p>
					    </div>
					</div>
					<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="button" class="btn btn-danger officer_showarea_cancle_farmer">ยกเลิกดูข้อมูลเกษตรกร</button>
						</div>
					</div>
				</div>
				</form>
		  	</div>

<!-- //////////////////////////// -->
				<div class="col-md-12 officer-main-content" style="display:none;" id="div_farmer_edit_area">
		  	<button id="officer_add_cancle_top_farmer" type="button" class="btn btn-danger btn-add officer_showarea_cancle_farmer">ยกเลิกดูข้อมูลเกษตรกร</button>
		  	<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/officer/addProfile/commit')}}">
				<div class="panel-heading"><h2 class="head-col">ข้อมูลเกษตรกร</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
					      <div class="col-md-4">
					        <label class="head_show">ชื่อ-นามสกุล : </label><p id="farmer_editarea_name"></p>
					      </div>
					      <div class="col-md-3">
									<label class="head_show">รหัสบัตรประชนชน : </label><p id="farmer_editarea_cardid"></p>
					      </div>
								<div class="col-md-3">
									<label class="head_show">ชื่อผู้ใช้ : </label><p id="farmer_editarea_urname"></p>
					      </div>
								<div class="col-md-2">
									<label class="head_show">รหัสผ่าน : </label><p id="farmer_editarea_password"></p>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-6">
										<label class="head_show">ที่อยู่ : </label><p  id="farmer_editarea_address"></p>
					      </div>
					    </div>
							<div class="form-group">
					      <div class="col-md-6">
									<label class="head_show">ตำแหน่ง : </label><p  id="farmer_editarea_typeuser"></p>
					      </div>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลสมาชิก</h2><hr></div>
				<div class="panel-body">
					    <div class="col-md-4 col-sm-4 col-xs-4">
								<label class="head_show">สมาชิก : </label><p  id="farmer_editarea_community"></p>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลติดต่อ</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
								<label class="head_show">เบอร์โทรศัพท์ : </label><p id="farmer_editarea_tel"></p>
					    </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					      <label class="head_show">อีเมล์ : </label><p id="farmer_editarea_email"></p>
					    </div>
					    <div class="col-md-4 col-sm-4 col-xs-4">
					      <label class="head_show">เฟสบุ๊ค : </label><p id="farmer_editarea_facebook"></p>
					    </div>
					</div>
					<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="button" class="btn btn-danger officer_showarea_cancle_farmer">ยกเลิกดูข้อมูลเกษตรกร</button>
						</div>
					</div>
				</div>
				</form>
		  	</div>
</div>
<script>
function officer_hide_community(){
	$("#officer_community").hide();
}
function officer_show_community(){
	$("#officer_community").show();
}
function officer_farmer_show_area(id){
	$.ajax({
		  url: site_url+"/auth/getUserProfile/"+id
		}).then(function(profiledata) {
		   	  $.each(profiledata.data, function(index, value) {
						$("#farmer_showarea_name").html(value.prefix_name+' '+value.fname+' '+value.lname);
						$("#farmer_showarea_cardid").html(value.card_id);
						$("#farmer_showarea_urname").html(value.member_id);
						$("#farmer_showarea_password").html('<button type="button" class="btn btn-default" onclick="farmer_password_show('+value.id+')">แสดง</button>');
						$("#farmer_showarea_address").html(value.address);
						$("#farmer_showarea_typeuser").html(value.tu_name);
						$("#farmer_showarea_community").html(value.fmcm_name);
						$("#farmer_showarea_facebook").html(value.fmcm_name);
					});
					$("#farmer_showarea_tel").html(profiledata.phone[0].ct_detail);
					$("#farmer_showarea_email").html(profiledata.email[0].ct_detail);
		});
	$("#farmer_add_area").hide();
	$("#farmer_detail_area").hide();
	$("#div_farmer_show_area").show();
}
function officer_farmer_edit_area(id){
	$.ajax({
		  url: site_url+"/auth/getUserProfile/"+id
		}).then(function(profiledata) {
		   	  $.each(profiledata.data, function(index, value) {
						$("#farmer_editarea_name").html(value.prefix_name+' '+value.fname+' '+value.lname);
						$("#farmer_editarea_cardid").html(value.card_id);
						$("#farmer_editarea_urname").html(value.member_id);
						$("#farmer_editarea_password").html('<button type="button" class="btn btn-default" onclick="farmer_password_edit('+value.id+')">เปล</button>');
						$("#farmer_editarea_address").html(value.address);
						$("#farmer_editarea_typeuser").html(value.tu_name);
						$("#farmer_editarea_community").html(value.fmcm_name);
						$("#farmer_editarea_facebook").html(value.fmcm_name);
					});
					$("#farmer_editarea_tel").html(profiledata.phone[0].ct_detail);
					$("#farmer_editarea_email").html(profiledata.email[0].ct_detail);
		});
	$("#farmer_add_area").hide();
	$("#farmer_detail_area").hide();
	$("#div_farmer_show_area").hide();
	$("#div_farmer_edit_area").show();
}
$(document).ready(function(){
	//ค่าเริ่มต้น
	$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		});
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_province/"+$("#province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
							opt += '<td>'+value.tu_name+'</td>';
							var phone = farmers.phone[i][0]+farmers.phone[i][1]+farmers.phone[i][2]+"-"+farmers.phone[i][3]+farmers.phone[i][4]+farmers.phone[i][5]+farmers.phone[i][6]+farmers.phone[i][7]+farmers.phone[i][8]+farmers.phone[i][9];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
				   	opt+= '<td><a onclick="officer_farmer_show_area('+value.id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a>';
						opt+= '<a onclick="officer_farmer_edit_area('+value.id+')" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
							opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });

			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#province_area").change(function(){
		$("#aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		});
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_province/"+$("#province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
							opt += '<td>'+value.tu_name+'</td>';
						var phone = farmers.phone[i][0]+farmers.phone[i][1]+farmers.phone[i][2]+"-"+farmers.phone[i][3]+farmers.phone[i][4]+farmers.phone[i][5]+farmers.phone[i][6]+farmers.phone[i][7]+farmers.phone[i][8]+farmers.phone[i][9];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
				   	opt+= '<td><a onclick="officer_farmer_show_area('+value.id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });

			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#aumphur_area").change(function(){
		$("#district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  	opt += '<option value="0">เลือกตำบล</option>';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#district_area").html(opt);

		});
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_aumphur/"+$("#aumphur_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
							opt += '<td>'+value.tu_name+'</td>';
						var phone = farmers.phone[i][0]+farmers.phone[i][1]+farmers.phone[i][2]+"-"+farmers.phone[i][3]+farmers.phone[i][4]+farmers.phone[i][5]+farmers.phone[i][6]+farmers.phone[i][7]+farmers.phone[i][8]+farmers.phone[i][9];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
				   	opt+= '<td><a onclick="officer_farmer_show_area('+value.id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });

			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});

	});
// ส่วนของตำบลเมื่อมีการเปลี่ยนแปลง
	$("#district_area").change(function(){
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_district/"+$("#district_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
							opt += '<td>'+value.tu_name+'</td>';
						var phone = farmers.phone[i][0]+farmers.phone[i][1]+farmers.phone[i][2]+"-"+farmers.phone[i][3]+farmers.phone[i][4]+farmers.phone[i][5]+farmers.phone[i][6]+farmers.phone[i][7]+farmers.phone[i][8]+farmers.phone[i][9];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
				   	opt+= '<td><a onclick="officer_farmer_show_area('+value.id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });

			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
			//$("#name_table_area").html('รายชื่อเกษตรกรตำบล : '+$("#district_area option:selected").html());
		   	$("#farmer_show_area").html(opt);
		});
	});
// เพิ่มชาวเกษตร
	$("#officer_add_farmer").click(function(){
		$("#farmer_detail_area").hide();
		$("#farmer_add_area").show();
	});
	$("#officer_add_cancle_farmer").click(function(){
		$("#farmer_add_area").hide();
		$("#farmer_detail_area").show();
	});
	$("#officer_add_cancle_top_farmer").click(function(){
		$("#farmer_add_area").hide();
		$("#farmer_detail_area").show();
	});
	$(".officer_showarea_cancle_farmer").click(function(){
		$("#farmer_add_area").hide();
		$("#farmer_detail_area").show();
		$("#div_farmer_show_area").hide();
		$("#div_farmer_edit_area").hide();
	});
});


$(document).ready(function(){
	//ค่าเริ่มต้น
	$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#add_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#add_aumphur_area").html(opt);
		   	  $("#add_district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#add_district_area").html(opt);
				});
		});
		$.ajax({
		  url: site_url+"/api/v1.0/farmercomunity"
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.fmcm_id+'">'+value.fmcm_name+'</option>';
		   	  });
		   	  $("#add_farmer_farmercomunity_area").html(opt);
		});

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#add_province_area").change(function(){
		$("#add_aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#add_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#add_aumphur_area").html(opt);
		   	  $("#add_district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#add_district_area").html(opt);
				});
		});
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#add_aumphur_area").change(function(){
		$("#add_district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#add_district_area").html(opt);

		});
	});
});
</script>
