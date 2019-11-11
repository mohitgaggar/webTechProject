const list=document.querySelector('#task-list ol');

// list.addEventListener('click',function(e){
// 	if(e.target.className == 'delete'){
// 		const li=e.target.parentElement;
// 		li.parentElement.removeChild(li);
// 	}
// });

// delete tasks
list.addEventListener('click',function(e){
	if(e.target.className=='delete')
	{
		const li=e.target.parentElement;
		li.parentElement.removeChild(li);
	}
});



// add topics
const addForm= document.getElementById('add-task');
console.log(addForm);
addForm.addEventListener('submit',function(e){
	e.preventDefault();
	// e.stopPropogation();
	const value=addForm.querySelector('input[type="text"]').value;
	document.getElementById('input-taskadd').value='';
	console.log(value);
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
	console.log(li);
});
