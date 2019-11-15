<!-- <?php
session_start();
include('headerp.php');
if(!isset($_SESSION['user_name']))
{
	header("location: index.php");
}
?> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Task-Adder</title>
<style type="text/css">
		body{
    font-family: Tahoma;
    color: #444;
    letter-spacing: 1px;
}

#wrapp{
    width: 70%;
    max-width: 960px;
    margin: 20px auto;
    border-radius: 6px;
   /* box-shadow: 0px 1px 6px rgba(0,0,0,0.2);
    box-sizing: border-box;*/
    padding: 0 0 20px;
    /*overflow: hidden;*/
    border: 1px solid lightgray;
}

#page_top{
    background: #eee ;
    padding: 10px 0;

}

#page_top h1, #page_top p{
    width: 100%;
    text-align: center;
    margin: 10px 0;
}

#page_top input{
    width: 90%;
    max-width: 300px;
    margin: 20px auto;
    display: block;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 18px;
}

#task-list, #add-book, #tabbed-content{
    margin: 30px;
}

#task-list ul, #tabbed-content ul{
    list-style-type: none;
    padding: 0;
}

#task-list li{
    padding: 20px;
    border-left: 5px solid #ddd;
    margin: 20px 10px;
}

#task-list li:hover{
    border-color: #9361bf;
}

.delete{
    float: right;
    background: #9361bf;
    padding: 6px;
    border-radius: 7px;
    cursor: pointer;
    color: white;
}

.delete:hover{
    background: #333;
}

#add-task{
    width: 400px;
    margin: auto;
}

#add-task input{
    display: block;
    margin: 20px 0;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 16px;
    border-radius: 4px 0 0 4px;
    box-sizing: border-box;
    width: 300px;
    float: left;
    clear: both;
}

#add-task button{
    border: 1px solid #9361bf;
    background: #9361bf;
    padding: 10px 20px;
    font-size: 16px;
    display: inline-block;
    margin: 0;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
    width: 100px;
    float: left;
    margin: 20px 0;
    border-left: 0;
    color: white;
}

#add-task:after{
    content: '';
    display: block;
    clear: both;
}

#add-task #hide{
  width: 30px;
}

#add-task label{
  line-height: 50px;
}
	</style>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
		<!-- Font Awesome -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
	<!-- JavaScript -->
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
</head>
  <body>
  	<div id="wrapp">
	    <header>
	    	<div id="page_top">
	    		<h1 class="title">Task Adder</h1>
          <p>Simple page to add tasks</p>
          <form id="search-task">
            <input type="text" id="search-inp" autocomplete="off" placeholder="Search Tasks..." />
          </form>
	    	</div>
	    </header>
	    <form id="add-task" method="get">
	    	    <div id="task-list">
	    	<h2 class="title-task">Tasks to do</h2>
	    	<ol name="tasker">
	    		<!--  <li>
	    			<span class="name">Learning</span>
	    			<span class="delete">delete</span>
	    		</li> -->
	    		<!--
	    		<li>
	    			<span class="name">Gaming</span>
	    			<span class="delete">delete</span>
	    		</li>
	    		<li>
	    			<span class="name">Sleep again</span>
	    			<span class="delete">delete</span>
	    		</li>
	    		<li>
	    			<span class="name">Get Up</span>
	    			<span class="delete">delete</span>
	    		</li> -->
			</ol>
			
	    </div>
        <input type="checkbox" id="hide" />
        <label for="hide">Hide all Tasks</label>
			<input type="text" id="input-taskadd" autocomplete="off" placeholder="Add a Task..." />
			<input type="time" name="time1" class="time0">
			<input type="time" name="time2" class="time1">
			<br>
	    	<button>Add</button>
			<!-- <button id="piechart">PieChart</button> -->
			<canvas id="pieChart_make"></canvas>
	    </form>
    </div>
    <div>
   	    	<center><button  id="targett">Submit</button></center>
	    	 <!-- <?php include("task_act.php");?> -->
	</div>
<script src="jquery-3.4.1.js">
	if (typeof jQuery == 'undefined') {  
    console.log("jQuery is not loaded");  
    //or
    alert("jQuery is loaded");  
} else {
    console.log("jQuery is not loaded");
     alert("jQuery is not loaded"); 
}
$("h1").click(function(){
  alert("The paragraph was clicked.");
});

$( "#targett" ).click(function() {
  alert( "Handler for .click() called." );
  var value = localStorage.getItem('todo');
 
	jQuery.post("task_act.php", {myKey: value}, function(data)	
	{	
	 	 alert("Do something with example.php response");	
	}).fail(function()	
	{	
	  alert("Damn, something broke");
	});
});
</script>


	<script>
var arr = [];
const list=document.querySelector('#task-list ol');

// list.addEventListener('click',function(e){
// 	if(e.target.className == 'delete'){
// 		const li=e.target.parentElement;
// 		li.parentElement.removeChild(li);
// 	}
// });

let list_time_diff=new Array();
let l=new Array();
let count=0;
// delete tasks
list.addEventListener('click',function(e){
	let li_list=document.querySelectorAll('#task-list ol li');
	// console.log(li_list.length);
	let c=0;
	let final_c;
	// console.log(e.target);
	// console.log(e.target.parentElement);
	// console.log(li_list[0].children[0].innerText);
	//console.log(list_time_diff);
	//console.log(l+"l1");

	for (i=0;i<li_list.length;i++)
	{
		if(li_list[i] == e.target.parentElement)
		{
			console.log(li_list[i]);
			console.log(li_list[i].querySelector('.name'));
			console.log(li_list[i].querySelector('.name').textContent);
			let dd=li_list[i].querySelector('.name').textContent;
			final_c=i;
			var k=0;var j=0;
			arr.splice(i,1);
			saveTodos();
			// console.log("hi");
			const li=e.target.parentElement;
			li.parentElement.removeChild(li);
			list_time_diff.splice(i, 1);
			l.splice(i, 1);
		}
		// if(e.target.className=='delete')
		// {
		// 	 break;
		// }
		// console.log(list_time_diff);
		// console.log(l+"l");
	}	
	count--;
	let colors=["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"];
	let bg_colors=["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
	var ctxP = document.getElementById("pieChart_make").getContext('2d');
	var myPieChart = new Chart(ctxP, {
	type: 'pie',
	data: {
		labels: l.slice(0,count+1),
		datasets: [{
			data: list_time_diff.slice(0,count+1),
			backgroundColor: colors.slice(0,count+1),
			hoverBackgroundColor: bg_colors.slice(0,count+1)
		}]
	},
	options: {
		responsive: true
	}
})

	
});


function saveTodos()
{
	var s=JSON.stringify(arr);
	localStorage.setItem("todo",s);
}




// function set_cookie(cookiename, cookievalue, hours) {
//     var date = new Date();
//     date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
//     document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();

// }


// add tasks
const addForm= document.forms['add-task'];
addForm.addEventListener('submit',function(e){
	e.preventDefault();
	const value=addForm.querySelector('input[type="text"]').value;
	arr.push(value);
	saveTodos();
	document.getElementById('input-taskadd').value='';
	//console.log(value);
	//creating stuff
	const li=document.createElement('li');
	const bn=document.createElement('span');
	const dn=document.createElement('span');
	// add content
	bn.textContent=value;
	dn.textContent='delete';
	bn.classList.add('name');
	
	dn.classList.add('delete');
	li.appendChild(bn);
	li.appendChild(dn);
	list.appendChild(li);
	let time0=document.querySelector(".time0").value;
	let time1=document.querySelector(".time1").value;
	let t0=time0.split(":");
	let t1=time1.split(":");
	let numt00=parseInt(t0[0]);
	let numt01=parseInt(t0[1]);
	let numt10=parseInt(t1[0]);
	let numt11=parseInt(t1[1]);
	let time_diff=(numt10-numt00)*60 + (numt11-numt01);
	list_time_diff[count]=time_diff;
	console.log(list_time_diff);
	l[count]=value;
	let colors=["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"];
	let bg_colors=["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
	var ctxP = document.getElementById("pieChart_make").getContext('2d');
	var myPieChart = new Chart(ctxP, {
	type: 'pie',
	data: {
		labels: l.slice(0,count+1),
		datasets: [{
			data: list_time_diff.slice(0,count+1),
			backgroundColor: colors.slice(0,count+1),
			hoverBackgroundColor: bg_colors.slice(0,count+1)
		}]
	},
	options: {
		responsive: true
	}
});

count++;
});

// hide tasks
const check=document.querySelector('#hide');
hide.addEventListener("change",function(e){
	if(check.checked)
	{
		list.style.display="none";
	}
	else
	{
		list.style.display="block";
	}
});

//search tasks
const searchb = document.forms['search-task'].querySelector('input');

document.getElementById('search-inp').addEventListener('submit', function(e) {
    e.preventDefault();
}, false);

searchb.addEventListener('keyup',function(e){
	const term=e.target.value.toLowerCase();
	e.preventDefault();
	// console.log(term);
	const tasks=list.getElementsByTagName('li');
	// console.log(tasks);
	Array.from(tasks).forEach(function(task){
		const title= task.firstElementChild.textContent;
		//console.log(title);
		if(title.toLowerCase().indexOf(term)!=-1)
		{
			task.style.display='block';
		}
		else
		{
			task.style.display='none';
		}
	});

});
	


	</script>
  </body>
</html>