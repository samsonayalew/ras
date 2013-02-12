function ajax_request( url, options, callback ){
		var req=null;
		
		var method = options.method || "GET"; 
		var sync = options.sync || true;
		
		//non-ie
		if(window.XMLHttpRequest){
			req = new XMLHttpRequest();
			req.onreadystatechange= function(){
				state_changed(req, callback);
			};
			
			req.open(method, url, sync);
			req.send(null);
		//for ie
		}else if(window.ActiveXObject){
			req = new ActiveXObject("Microsoft.XMLHTTP");
			req.onreadystatechange= function(){
				state_changed(req, callback);
			};
			
			req.open(method, url, sync);
			req.send();
		}
		
	}//end ajax_request
	function state_changed(req, callback){
		if(req.readyState == 4){
			if(req.status= 200){
				if(callback){
					 callback(req);
				}
				else{
					alert("problem reciving the data");
				}
			}
		}
	}