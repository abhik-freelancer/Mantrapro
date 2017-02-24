<?php 

class gallerymodel extends CI_Model{
	
	public function getAllVideo(){
		$data = array();
		$sql ="SELECT * FROM videogallery WHERE videogallery.is_active='Y' ORDER BY videogallery.id DESC ";
		$query = $this->db->query($sql);
        if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "videotitle"=>$rows->videotitle,
                    "videolink"=>$rows->videolink,
					"videoid"=>$this->getVideoId($rows->videolink)
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	}
	
	public function getVideoId($link){
		$video_id = explode("?v=", $link);
		$video_id = $video_id[1];
		return $video_id;
	}
	
}