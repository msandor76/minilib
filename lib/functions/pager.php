<?php
function pager($links, $cur_page, $num_pages){
	$page_links = "";
	// prev	
	if( $cur_page > 1 ){
		$page_links .= '<a href="'.$links.'?p='.($cur_page-1).'"> <- </a>';
	}
	else{
		$page_links .= ' <- ';
	}

	for($i=1; $i<=$num_pages; $i++){
		if( $cur_page == $i ){
			$page_links .= ' '.$i;
		}
		else{
			$page_links .= '<a href="'.$links.'?p='.$i.'"> '.$i.' </a>';
		}
	}

	if( $cur_page < $num_pages ){
		$page_links .= '<a href="'.$links.'?p='.($cur_page+1).'"> -> </a>';
	}
	else{
		$page_links .= ' -> ';
	}

	return $page_links;
		
}

/*
// Bootstrapos (4) version
function pager($links, $cur_page, $num_pages){
		$nextText = ">>";
		$prevText = "<<";
		$page_links = '<nav aria-label="pageslinks"><ul class="pagination">';
		// előző	
		if( $cur_page > 1 ){
			$page_links .= '<li class="page-item">
			  <a class="page-link" href="'.$links.'?p='.($cur_page-1).'" tabindex="-1" aria-disabled="true">'.$prevText.'</a>
			</li>';
		}
		else{
			$page_links .= '<li class="page-item disabled">
			  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">'.$prevText.'</a>
			</li>';
		}

		for($i=1; $i<=$num_pages; $i++){
			if( $cur_page == $i ){
				$page_links .= '<li class="page-item active" aria-current="page">
						  <a class="page-link" href="#">'.$i.' <span class="sr-only">(current)</span></a>
						</li>';
			}
			else{
				$page_links .= '<li class="page-item"><a class="page-link" href="'.$links.'?p='.$i.'">'.$i.'</a></li>';
			}
		}

		if( $cur_page < $num_pages ){
			$page_links .= '<li class="page-item">
						<a class="page-link" href="'.$links.'?p='.($cur_page+1).'"> '.$nextText.' </a>
						</li>';
		}
		else{
			$page_links .= '<li class="page-item disabled">
			  <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> '.$nextText.' </a>
			</li>';
		}

		$page_links .= '</ul></nav>';
		return $page_links;
		
}
* */
?>
