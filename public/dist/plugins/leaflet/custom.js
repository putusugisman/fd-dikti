	 
		$(".load-terminal").on('change', function(){
			var opsi = (($(this).is(':checked')) ? '1' : '2'); 
			getTerminalInfo(opsi);
		}); 
		$(".load-pelabuhan").on('change', function(){ 
			var opsi = (($(this).is(':checked')) ? '1' : '2'); 
			getPelabuhanInfo(opsi); 
		});
		$(".load-uppkb").on('change', function(){ 
			var opsi = (($(this).is(':checked')) ? '1' : '2'); 
			getUppkbInfo(opsi); 
		});    
		
		$(".toggle-btn").click(function(){
			$("center").toggle(1000, function(){
				
			});
		});
		
		
		$(".all-btn").click(function(){
			getTerminalInfo(1);
			getPelabuhanInfo(1);
			getUppkbInfo(1); 
			$(".load-terminal").prop("checked",true)
			$(".load-pelabuhan").prop("checked",true)
			$(".load-uppkb").prop("checked",true) 
		});  
		  
	var map = L.map('mapKoordinat', {   
		preferCanvas: true,
		minZoom: 5,
		zoomControl: false
	}); 
	  
var myRenderer = L.canvas({ padding: 0.5 });
		
	L.control.zoom({
	 position:'topright'
	}).addTo(map);

	map.setView([-0.7714296, 111.2124238], 5); 
	var Layer=L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});
		
	map.addLayer(Layer); 
	var baseLayers = [];   
	 
	function getTerminalInfo(opsi) {   
		$(".cek_load").show();
		$.getJSON(BASE_URL + '/ajax/terminalAPI', function (data) { 
			$("#loadTotalTerminal").html(data.length);  
			$(".cek_load").hide(); 
			if (data.length > 0) {
				$.each(data, function (i, item) { 
					var latK = item[0];  
					var longK = item[1];  	 
					var id = item[2];  
					var nama = item[3]; 
					var icon = item[4]; 
					 
					var layerSt = L.canvasMarker(L.latLng(latK, longK), {
						radius: 20,
						prevLatlng: L.latLng(latK, longK),   
						img: {
							url: BASE_URL+'/storage/app/prasarana/'+icon,
							size: [40, 40],
							rotate: 90,
						},
					}).addTo(map).bindPopup('<center><h5>' + nama + '</h5></center>');  
					$(".load-terminal").on('click',function(){ 
						map.removeLayer(layerSt);
						$("#loadTotalTerminal").html(0);   
					});
					if(opsi==1) {
						map.addLayer(layerSt);
					}else{
						map.removeLayer(layerSt);
						$("#loadTotalTerminal").html(0); 
					}
				});
			} 
		}); 
		
	}
	function getPelabuhanInfo(opsi) { 
		$(".cek_load").show();
		$.getJSON(BASE_URL + '/ajax/pelabuhanAPI', function (data) { 
			$("#loadTotalPelabuhan").html(data.length); 
			$(".cek_load").hide();
			if (data.length > 0) {
				$.each(data, function (i, item) {  
					var latK = item[0];  
					var longK = item[1]; 
					var id = item[2];  
					var nama = item[3];
					var icon = item[4];   
					 
					var layerJb = L.canvasMarker(L.latLng(latK, longK), {
						radius: 20,
						prevLatlng: L.latLng(latK, longK),    
						img: {
							url: BASE_URL+'/storage/app/prasarana/'+icon,
							size: [40, 40],
							rotate: 90,
						},
					}).addTo(map).bindPopup('<center><h5>' + nama + '</h5></center>');
					$(".load-pelabuhan").on('click',function(){ 
						map.removeLayer(layerJb);
						$("#loadTotalPelabuhan").html(0);   
					});
					if(opsi==1) {
						map.addLayer(layerJb);
					}else{
						map.removeLayer(layerJb);
						$("#loadTotalPelabuhan").html(0);   
					}
				});
			} 
		});
	} 
	function getUppkbInfo(opsi) {
		$(".cek_load").show(); 
		$.getJSON(BASE_URL + '/ajax/uppkbAPI', function (data) { 
			$("#loadTotalUppkb").html(data.length); 
			$(".cek_load").hide();
			if (data.length > 0) {
				$.each(data, function (i, item) {   
					var latK = item[0];  
					var longK = item[1]; 
					var id = item[2];  
					var nama = item[3];
					var icon = item[4];    
					 
					var layerTr = L.canvasMarker(L.latLng(latK, longK), {
						radius: 20,
						prevLatlng: L.latLng(latK, longK),    //previous point
						img: {
							url: BASE_URL+'/storage/app/prasarana/'+icon,
							size: [40, 40],
							rotate: 90,
						},
					}).addTo(map).bindPopup('<center><h5>' + nama + '</h5></center>');
					$(".load-uppkb").on('click',function(){ 
						map.removeLayer(layerTr);
						$("#loadTotalUppkb").html(0);   
					});
					if(opsi==1) {
						map.addLayer(layerTr);
					}else{
						map.removeLayer(layerTr);
						$("#loadTotalUppkb").html(0);   
					}
				});
			} 
		});
	} 