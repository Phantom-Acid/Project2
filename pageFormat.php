<!--This PHP function, named pageHeader, is designed to generate a header section for a webpage. It takes three parameters: $title (presumably the title of the page), $logo (the URL of the logo image), and $itemArr (an array of items for navigation).

The function first outputs the logo image with a fixed width and height. Then, it iterates through each item in the $itemArr array, generating a navigation link for each item. Each link is created as an anchor (<a>) tag with a corresponding PHP file ($item.php) as the href attribute.

Finally, the function adds a horizontal line (<hr>) to visually separate the header from the rest of the page content.-->


<?php 
/*function pageHeader($title, $logo, $itemArr)
{
	echo "<img src=\"$logo\" alt=\"$logo\" width=\"200\" height=\"100\">";
	foreach($itemArr as $item)
	{
		$mLink=$item.".php";
		echo "<a href = \"$mLink\" style=\"margin-right: 30px; text-decoration: none;\"><span class=\"m-3\" style=\"font-size: 30px;\">$item</span></a>";	
	}
	echo"<hr>";
}*/


function pageHeader($title, $logo, $itemArr)  
{
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
    echo "<div class='container'>";
    echo "<a class='navbar-brand' href='#'><img src='$logo' alt='$logo' width='200' height='100'></a>";
    echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
    echo "<span class='navbar-toggler-icon'></span>";
    echo "</button>";
    echo "<div class='collapse navbar-collapse justify-content-end' id='navbarNav'>";
    echo "<ul class='navbar-nav'>";
    foreach($itemArr as $item)
    {
        $mLink = $item . ".php";
        echo "<li class='nav-item'><a class='nav-link' href='$mLink'>$item</a></li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</nav>";
    echo "<hr>";
}

?>