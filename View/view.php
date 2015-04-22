<?php

class View{
	
	public function displayProducts($page, $linesPerPage, $maxProducts, $products){
		
		$offset = $page * $linesPerPage;
		$output = '';
		
		 for($x = 0; $x < $linesPerPage; $x++) {
				
				if ($x + $offset >= $maxProducts){
						break;
				}
				
				$output .= '<li>'; 
				$output .= '<div class="image">';
				$output .= '<a href="detail.html">';
				$output .= '<img src="images/'
						. $products[$x + $offset]['link']
						. '.scale_20.JPG" alt="'
						. $products[$x +$offset]['title']
						. '" width="190" height="130"/>';		
				$output .= '</a>';
				$output .= '</div>';
				$output .= '<div class="detail">';
				$output .= '<p class="name"><a href="detail.html">'
						.  $products[$x + $offset]['title']
						.'</a></p>';
				$output .= '<p class="view"><a href="detail.html">purchase</a> | <a href="detail.html">view details >></a></p>';		
				$output .= '</div>';
				$output .= '</li>';
		}
		return $output;
		
}



	public function displayMembers($page, $linesPerPage, $maxMembers, $members){
		
		$offset = $page * $linesPerPage;
		$output = '';
		
		 for($x = 0; $x < $linesPerPage; $x++) {
				
				if ($x + $offset >= $maxMembers){
						break;
				}
				
				$output .= '<tr>';
				$output .= '<td>' . $members[$x + $offset]['user_id']  .'</td>';
				$output .= '<td><img src="images/m.gif">' .$members[$x + $offset]['name'] .'</td>';
				$output .='<td>' . $members[$x + $offset]['city'] . '</td>';
				$output .= '<td><img src="images/e.gif"/>' . $members[$x + $offset]['email'] . '</td>';
				$output .= '</tr>';
		}
		return $output;
	}
}