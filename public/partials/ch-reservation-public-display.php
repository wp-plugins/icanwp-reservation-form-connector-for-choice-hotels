<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/public/partials
 */
 ?>

<div id="CH-WEBSPI" class="ch-reservation-form-container">
	<form id="CH-WEBSPI-Reserve" class="ch-reservation-form" method="post" action="javascript:void(0);">
		<div id="CH-WEBSPI-CheckInContainer" class="ch-reservation-check-in-container">
			<label for="checkInDate">Check In:</label>
			<input type="text" id="checkInDate" class="ch-reservation-check-in-date" name="checkInDate" readonly="readonly">
		</div>
		<div id="CH-WEBSPI-CheckOutContainer" class="ch-reservation-check-out-container">
			<label for="checkOutDate">Check Out:</label>
			<input type="text" id="checkOutDate" class="ch-reservation-check-out-date" name="checkOutDate" readonly="readonly">
		</div>
		<div id="CH-WEBSPI-RoomsContainer" class="ch-reservation-rooms-container">
			<label for="rooms">Rooms</label>
			<input id="rooms" class="ch-reservation-spinner-input" name="rooms">
		</div>
		<div id="CH-WEBSPI-AdultsContainer" class="ch-reservation-adults-container">
			<label for="adults">Adults:</label>
			<input id="adults" class="ch-reservation-spinner-input" name="adults">
		</div>
		<div id="CH-WEBSPI-MinorsContainer" class="ch-reservation-minors-container">
			<label for="minors">Children</label>
			<input id="minors" class="ch-reservation-spinner-input" name="minors">
		</div>
		<div id="CH-WEBSPI-RateCodeContainer" class="ch-reservation-rate-code-container">
			<label for="ratePlanCode">Select Special Rate</label>
			<select name="ratePlanCode" id="ratePlanCode" class="ch-reservation-rate-plan-code">
				<option value="RACK" selected="selected">Best Available Rate</option>
				<option value="SSC">Senior/AARP</option>
				<option value="S3A">AAA/CAA Program Rate</option>
				<option value="SRD">Choice Privileges Reward Night</option>
				<option value="SGM">Government/Military Rate</option>
				<option value="LSTATE">State Government Rate</option>
				<optgroup label="Special Rate/ Corp ID">
				<option value="RACK">Please Proceed and Modify the Rate Options</option>
				</optgroup>
			</select>
		</div>
		<div id="CH-WEBSPI-ButtonContainer" class="ch-reservation-button-container">
			<label for="rate-button">Find Rate</label>
			<button id="getRate" class="ch-reservation-get-rate" name="rate-button">Find Rate</button>
		</div>
	</form>
	<div id="CH-WEBSPI-Reserve-ErrorCode" class="ch-reservation-error-code">
		<p id="CH-WEBSPI-Reserve-ErrorMsg" class="ch-reservation-error-msg"></p>
	</div>
	<script type="text/javascript">
	(function($) {
		$("#checkInDate").datepicker({
			minDate:0,
			maxDate:"+1y -1d",
			dateFormat:"yy-mm-dd",
			onClose: function(){
				var tomorrow = new Date(Date.parse($("#checkInDate").datepicker("getDate")));
				tomorrow.setDate(tomorrow.getDate()+1);
				$("#checkOutDate").datepicker("option","minDate", tomorrow);
				<?php 
					$auto_select = intval(get_option( 'ch_reservation_check_disable_auto_checkout_select' ));
					if( $auto_select !== 1){
				?>
					$("#checkOutDate").datepicker("show");
				<?php
					}
				?>
				$("#checkInDate").datepicker("hide");
			},
			beforeShow: function(input, inst) {
				$('#ui-datepicker-div').addClass('ch-reservation-cal');
			}
		});
		$("#checkOutDate").datepicker({
			minDate:"+1d",
			maxDate:"+1y",
			dateFormat:"yy-mm-dd",
			beforeShow: function(input, inst) {
				$('#ui-datepicker-div').addClass('ch-reservation-cal');
			}
		});
		$("#adults").val(1);
		$("#adults").spinner({
			min:1
		});
		$("#minors").val(0);
		$("#minors").spinner({
			min:0
		});
		$("#rooms").val(1);
		$("#rooms").spinner({
			min:1
		});
		
		
		$("#getRate").click(function() {
			var errorCode = errorCheck();
			if(errorCode == ""){
				window.open("<?php echo get_option( 'ch_reservation_input_choicehotels_url' ); ?>?" + $("form").serialize());
			}else{
				$("#CH-WEBSPI-Reserve-ErrorMsg").text("The following fields are required: " + errorCode);
				return false;
			}
		});
		
		function errorCheck(){
			var errorCode = "";
			if($("#checkInDate").val() ==""){
				errorCode += "Check-In Date";
				$("#CH-WEBSPI-CheckInContainer").addClass("WEBSPI-Error");
			}
			if($("#checkOutDate").val() ==""){
				if(errorCode != ""){
					errorCode += ", ";
				}
				errorCode += "Check-Out Date";
				$("#CH-WEBSPI-CheckOutContainer").addClass("WEBSPI-Error");
			}
			if(errorCode != ""){
				errorCode += ".";
			}
			return errorCode;
		}
		
	})(jQuery);
</script>
</div>