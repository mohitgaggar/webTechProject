<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Task-Adder</title>
<link rel="stylesheet" href="reg_add.css">
  </head>
  <body>
  	<div id="wrapp">
	    <header>
	    	<div id="page_top">
	    		<h1 class="title">Topic Adder</h1>
          <p>Simple page to add the topics you want to be associated with</p>
          <form id="search-task">
            <input type="text" id="search-inp" autocomplete="off" placeholder="Search Tasks..." />
          </form>
	    	</div>
	    </header>
	    <div id="task-list">
	    	<h2 class="title-task">Tasks to do</h2>
	    	<ol>
	    		<li>
	    			<span class="name">Gardening</span>
	    			<span class="delete">delete</span>
	    		</li>
	    	</ol>
	    </div>
	    <form id="add-task">
	    	<input type="text" id="input-taskadd" autocomplete="off" placeholder="Add a Task..." />
	    	<button>Add</button>
	    </form>
    </div>
    <script src="reg_add.js"></script>
  </body>
</html>