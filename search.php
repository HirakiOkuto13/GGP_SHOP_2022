<style>
#search {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

.dropdown-content {
  display: none;
  position: absolute;        
  z-index: 999;
  top: 100%;
  left: 0;
}

.dropdown-content a {
  color: red;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {
  background-color: #f2f2f2;
}

.show {
  display: block;
}

.result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }

</style>

<!DOCTYPE html>
<html>
<head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- Including jQuery is required. -->

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <!-- Including our scripting file. -->

   <script type="text/javascript" src="script.js"></script>

   <!-- Including CSS file. -->

   <!-- <link rel="stylesheet" type="text/css" href="css/search.css"> -->

</head>
<body>
<!-- Search box. -->

<div class="dropdown">
				<button onclick="myFunction()" class="btn btn-primary"><span class="icon-search"></span></button>
					<div id="myDropdown" class="dropdown-content">
					<input type="text" id="search" placeholder="Search...">
                <div id="display">
                <a href="product-details.php?pid=<?php echo $fetch_product['id'];?>" >
          </div>
				</div>
				</div>

   <!-- <input type="text" autocomplete="off" id="search" placeholder="Search..." />
   <div id="display"></div> -->


<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>