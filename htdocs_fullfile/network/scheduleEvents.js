const list=document.querySelector('#task-list ol');





let count=0;
// delete notes
list.addEventListener('click',function(e){
    let li_list=document.querySelectorAll('#task-list ol li');
    if(e.target.className=='delete')
		{
            const li=e.target.parentElement;
            li.parentElement.removeChild(li);
		}
});


// add notes
const addForm= document.forms['add-task'];
addForm.addEventListener('submit',function(e){
	e.preventDefault();
	const value=addForm.querySelector('input[type="text"]').value;
	document.getElementById('input-taskadd').value='';
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
});




// hide all notes
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

//search for notes
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
	