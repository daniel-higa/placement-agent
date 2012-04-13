<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'office-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'firm_id'); ?>
		<?php echo $form->dropDownList($model, 'firm_id', GxHtml::listDataEx(Firm::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'firm_id'); ?>
		</div><!-- row -->
		
		<div>
			<label>Continents</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("officecontinents", CHtml::listData($model->officecontinents,'continent_id','continent_id'), CHtml::listData(Continent::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		
		<div style="display: block; margin-top: -50px; margin-left:200px;">
			<label>Regions</label>
			<div id="divcontainers">
			<?php echo CHtml::checkBoxList("officeregions", CHtml::listData($model->officeregions,'region_id','region_id'), CHtml::listData(Region::model()->findAll(),'id','name'),array('separator'=>'', 'template'=>'<span>{input} {label}</span>')); ?>
			</div>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'main_office'); ?>
		<?php echo $form->checkBox($model, 'main_office'); ?>
		<?php echo $form->error($model,'main_office'); ?>
		</div><!-- row -->
		<hr />
		<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)),array('onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'country_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 100, 'onchange' => 'changeAddress()')); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		
		
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAzr2EBOXUKnm_jVnk0OJI7xSosDVG8KKPE1-m51RBrvYughuyMxQ-i1QfUnH94QxWIa6N4U6MouMmBA" type="text/javascript"></script>
		<script type="text/javascript">
			var map;
			var geocoder;
			var address;
			var looking;
			var marker_usuario;
			var gm_active = false;

			window.onload = function(){
				initialize();
			}
		  function initialize() {
			map = new GMap2(document.getElementById("map_canvas"));
	        map.setCenter(new GLatLng(-34.60834329405626,-58.370830714702606), 14);
	        map.enableScrollWheelZoom();
	        map.getPane(G_MAP_FLOAT_SHADOW_PANE).style.display = "none";
			geocoder = new GClientGeocoder();
			<?php echo $model->sync_gmaps ? 'initMap();' : ''; ?>
		  }
		  
		  function initMap(){
		  	gm_active = true;
			changeAddress();
		  }
		  
		  function showAddress(address) {
			looking = true;
			
				if (geocoder) {
					geocoder.getLatLng(
						address,
						function(point) {
							looking = false;
							if (!point) {
								//alert("No se encontró la dirección.");
							} else {
								if(marker_usuario!=undefined){
									map.removeOverlay(marker_usuario);
								}
								
								map.setCenter(point, 14);
								map.savePosition();
							
								marker_usuario = new GMarker(point,{draggable: false,title:"Address of the Office",icon:null,dragCrossMove:false});
								marker_usuario.label = "Address of the Office";
		
								var addres_globo_usuario_ini  = new Array();
								var addres_globo = "";
								addres_globo_usuario_ini = address.split(",");
								addres_globo += "<font size='2' face='Courier' color='#575A63'>";
								addres_globo += addres_globo_usuario_ini[0];
								if(addres_globo_usuario_ini[1] != null) addres_globo += "<br />" + addres_globo_usuario_ini[1];
								if(addres_globo_usuario_ini[2] != null) addres_globo += "<br />" + addres_globo_usuario_ini[2];
								if(addres_globo_usuario_ini[3] != null) addres_globo += "<br />" + addres_globo_usuario_ini[3];
								addres_globo += "</font>";						
								
								map.addOverlay(marker_usuario);
								marker_usuario.openInfoWindowHtml(addres_globo);
								
							}
						}
					);
				}
			}//end showaddress
			
			function changeAddress(){
				if(gm_active){
					var country = E('Office_country_id').options[E('Office_country_id').selectedIndex].label;
					var city = E('Office_city').value;
					var state = E('Office_state').value;
					var address = E('Office_address').value;
					var filter = address;
					filter += (city != '' && filter !='' ? ',' : '') + city;
					filter += (state != '' && filter !='' ? ',' : '') + state;
					filter += (country != '' && filter !='' ? ',' : '') + country;
					showAddress(filter);
				}
			}
			
			function changeCheck(chk){
				if(chk.checked){
					gm_active = true;
					changeAddress();
				} else {
					gm_active = false;
					map.setCenter(new GLatLng(-34.60834329405626,-58.370830714702606), 14);
				}
			}
			
			function E(id){
				return document.getElementById(id);
			}
		 
		</script>
		<div style="display:block;margin-left: 450px; margin-top:-335px;height:400px;">
			<div><?php echo $form->checkBox($model, 'sync_gmaps',array('onclick' => 'changeCheck(this)')); ?>&nbsp;Synchronize with Google Maps</div><br />
			<div id="map_canvas" style="width: 400px; height: 250px;"></div>
		</div>
		

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->