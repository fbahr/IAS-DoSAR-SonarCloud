let token = sessionStorage.getItem("token");

var tokenName = sessionStorage.getItem('tokenName'); 
var tokenValue = sessionStorage.getItem('tokenValue');


axios.interceptors.request.use(config=>{
	config.headers[tokenName]=tokenValue;
	config.headers['key']=token;
	config.headers['sinks']="1";
	console.log(config.headers)
	return config;
})

var num=0;
var str="";

axios.interceptors.response.use(res=>{
	
	var strUrl = location.href;
	var arrUrl = strUrl.split("/");
	var pageName = arrUrl[arrUrl.length - 1];
	if(pageName=="" || pageName=="index.html"){
		if(res.data.msg=="token"){
			num++;
			str=""
		}else if(res.data.msg=="token "){
			num++;
			str=" "
		}else if(res.data.msg=="token"){
			num++;
			str=""
		}else if(res.data.msg=="token"){
			num++;
			str=""
		}else if(res.data.msg=="token"){
			num++;
			str=""
		}else if(res.data.msg==""){
			num++;
			str=""
		}
		if(num>=6){
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}
	}else if(pageName!="login.html"){
		if(res.data.msg=="token"){
			str=""
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}else if(res.data.msg=="token "){
			str=" "
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}else if(res.data.msg=="token"){
			str=""
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}else if(res.data.msg=="token"){
			str=""
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}else if(res.data.msg=="token"){
			str=""
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}else if(res.data.msg==""){
			str=""
			alert(str);
			num=0;
			str="";
			location.href = "login.html";
		}
		
		
	}
	
	
  return res;
},error=>{
	if(error.response.status == 401){
		location.href = "login.html";
	}
	if(error.response.status == 404){
		location.href = "404";
	}
});
