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
	console.log(list_time_diff);
	console.log(l+"l1");

	for (i=0;i<li_list.length;i++)
	{
		// console.log(li_list[i]);
		if(li_list[i] == e.target.parentElement)
		{
			final_c=i;
			console.log("hi");
			const li=e.target.parentElement;
			li.parentElement.removeChild(li);
			list_time_diff.splice(i, 1);
			l.splice(i, 1);
		}
		// if(e.target.className=='delete')
		// {
		// 	 break;
		// }
		console.log(list_time_diff);
		console.log(l+"l");
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


// add tasks
const addForm= document.forms['add-task'];
addForm.addEventListener('submit',function(e){
	e.preventDefault();
	const value=addForm.querySelector('input[type="text"]').value;
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
	