<?php
class Dynamic_dependent_model extends CI_Model
{
 function fetch_country()
 {
  $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("country");
  return $query->result();
 }

 function fetch_state($country_id)
 {
     if($country_id=='')
     {
         //$this->db->where('category_id', $country_id);

  $query = $this->db->get('cover_image');
     }
     else
     {
  $this->db->where('category_id', $country_id);

  $query = $this->db->get('cover_image');
}
  foreach($query->result() as $row)
  {
     $output .='<div class="col-lg-2 col-md-3 col-sm-6 mb-4"  >';
 $output .='<a href="#" class="main-link" >';
                                  $output .=' <img class="hi-img-hund" src="https://hiconnect.co.in/uploads/cover_images/'.$row->file_name.'" alt="" >';
                                    $output .='<input class="project-title form-control" type="submit" name="set_cover" value="Set Cover" onclick="SetCover('.$row->cover_id.')" />';
                                    $output .=' <span class="overlay-mask"></span>';
                                 $output .=' </a>';	
                                   $output .='<input type="hidden" name="set_coverimg" id="set_coverimg" value="">'; 
                                  $output .='<div class="thm-btn text-center pt-3">';
	  $output .='</div>';
	  $output .='</div>';
  
  }
  return $output;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }
}

?>