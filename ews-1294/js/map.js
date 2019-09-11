
var redIcon = L.icon({
		iconUrl: '/wp-content/themes/ews1294/img/icon-ews-red.png',
		iconSize: [55, 55],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});
var greenIcon = L.icon({
		iconUrl: '/wp-content/themes/ews1294/img/icon-ews-green.png',
		iconSize: [55, 55],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});
var greyIcon = L.icon({
		iconUrl: '/wp-content/themes/ews1294/img/icon-ews-grey.png',
		iconSize: [45, 45],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});
var yellowIcon = L.icon({
		iconUrl: '/wp-content/themes/ews1294/img/icon-ews-yellow.png',
		iconSize: [55, 55],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});
var orangeIcon = L.icon({
		iconUrl: '/wp-content/themes/ews1294/img/icon-ews-yellow.png',
		iconSize: [55, 55],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});
var blueIcon = L.icon({
		iconUrl: '/wp-content/uploads/sites/4/2019/05/blueIcon.png',
		iconSize: [25, 41],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});




var dataTest={};
let showSensorGraph = (feature) => {
  
 
	// based on prepared DOM, initialize echarts instance
	//alert(feature.properties.external_id);
	var myChart = echarts.init(document.getElementById('popup-' + feature.properties.external_id));
//	myChart.showLoading();
	start = new Date();
	start.setHours(start.getHours()-6);
	//jQuery.get('http://localhost:8000/api/v1/sensors/TEPv2.2-015/datapoints/10', {external_id: feature.properties.external_id, start: start, end: new Date()}, function(sensorRecentData) {
	/*get api datapoint on sensor graph*/
jQuery.get('http://sms.ews1294.info/api/v1/sensors/sensor_event', {external_id: feature.properties.external_id, start: start, end: new Date()}, function(sensorRecentData) {
		var data =sensorRecentData;
		dataTest=data;
		myChart.hideLoading();
		// specify chart configuration item and data
		var option = {
			title: {
				left: 'center',
				text: feature.properties.name + " (" + feature.properties.external_id + ")"
			},
			tooltip: {
				trigger: 'axis',
				position: function (pos, params, el, elRect, size) {
					var obj = {top: 10};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 30;
					return obj;
				}
	    	},

			toolbox: {
		    	feature: {
			      	dataZoom: { show: false, yAxisIndex: 'none' },
			        restore: { show : false },
			        saveAsImage: { show: false, title : 'Save Image' }
		      	}
	    	},

	    xAxis: { type: 'time'},
	    yAxis: {
				type: 'value',
				boundaryGap: [0, '100%'],
			max: Math.max(...data.map(e => e.value[1]).concat(Math.floor(feature.properties.trigger_levels.severe_warning*1.1))),
				min: 0
			},
	    series: [
				{
					name: 'Water Level',
	        type: 'line',
	        smooth: true,
					smoothMonotone: 'y',
	        symbol: 'circle',
	        sampling: 'max',
	        itemStyle: { normal: { color: 'rgb(240,248,255)' } },
	        areaStyle: {
	        	normal: {
							color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
								{ offset: 0, color: 'rgb(0, 191, 255)' },
								{ offset: 1, color: 'rgb(0, 0, 128)' }
							])
	          	}
	        },
	        data: data,
					markLine: {
						name: 'Warning', type: 'line', smooth: true,
						data: [
							[{
	            		xAxis: data[0].value[0],
	            		yAxis: feature.properties.trigger_levels.warning,
	            		lineStyle: { normal: { color: "#ff9224" } },
	            		label: { normal: { show: true, position: 'end', formatter: 'Warning' } }
	          		},
	          		{ xAxis: data[data.length - 1].value[0], yAxis: feature.properties.trigger_levels.warning }
							],
							[
	           		{
	            		xAxis: data[0].value[0],
	            		yAxis: feature.properties.trigger_levels.severe_warning,
	            		lineStyle: { normal: { color: "#ff2323" } },
	            		label: { normal: { show: true, position: 'end', formatter: 'Severe warning' } }
	          		},
	          		{ xAxis: data[data.length - 1].value[0], yAxis: feature.properties.trigger_levels.severe_warning }
							]
				  	]
					}
        }
			]
		};


		// use configuration item and data specified to show chart
		myChart.setOption(option);
	})
}


// $( document ).on('turbolinks:load', function() {
// 	alert('hello');
jQuery( document ).ready(function() {
  
  var sensor_active=0;
     
  var map = L.map('map').setView([12.4031626,105.7709708], 7);
  
  var sensorData=
  L.tileLayer('https://api.mapbox.com/styles/v1/pintiadmin/cjmhgktg36qla2sltkn1tik4n/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    minZoom: 7,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoicGludGlhZG1pbiIsImEiOiJjam1oZnFoOWMwN3JnM3BwenR4dXRqdXU3In0.T_yiOVt7RbRe2VTDns2EMg'
  }).addTo(map);
/*get api geojson for mapping*/
  jQuery.get('http://sms.ews1294.info/api/v1/location.geojson', function(data) {
	sensorData=data;

    L.geoJSON(sensorData, {
      pointToLayer: function (feature, latlng) {

      	if(feature.properties.status == 'Test')
        	return L.marker(latlng, {icon: greenIcon});

		if(feature.properties.status == 'active'){
              sensor_active++;
        	  return L.marker(latlng, {icon: greenIcon});
        	}
		if(feature.properties.status == 'watch'){
              	sensor_active++;
        		return L.marker(latlng, {icon: yellowIcon});
        }
        
        
		if(feature.properties.status == 'warning'){
            sensor_active++;
        	return L.marker(latlng, {icon: orangeIcon});
        }
        
        
		if(feature.properties.status == 'severe_warning'){
          	sensor_active++;
        	return L.marker(latlng, {icon: redIcon});
        }
        
		if(feature.properties.status == 'inactive')
        	return L.marker(latlng, {icon: greyIcon});        
		if(feature.properties.status == 'planned')
        	return L.marker(latlng, {icon: blueIcon});
        
      },
			onEachFeature(feature, layer) {
				layer
					.bindPopup("<div  style='width:550px; height:300px;' class='popup_river_level' id='popup-" + feature.properties.external_id + "'></div>", {
						maxWidth: '100%'
					})
					.on('popupopen', function(event) {
						showSensorGraph(event.popup._source.feature)
					})
			} //end onEachFeature
    }).addTo(map) //end geojson




  })
  


jQuery.get('https://svfysqmr2h.execute-api.ap-southeast-1.amazonaws.com/prod/v1/stats', function(data) {
  	  
  
  	document.getElementById('register').innerHTML=data.subscribers;
  	document.getElementById('alert').innerHTML=data.phone_calls;
  	document.getElementById('sensor').innerHTML=sensor_active;
  	
  
  });


});//end ready