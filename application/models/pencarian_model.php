<?php
class Pencarian_model extends CI_Model {
 
 public function mencari($cari,$kategori)
{		
	if($kategori=='news')
	{
		$this->db->like('title', $cari);
		$query=$this->db->get('news');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $look)
			{
				$hasil[]=$look;
			}
			return $hasil;
		}
		else
		{
			$this->db->like('news', $cari);
			$query=$this->db->get('news');
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $look)
				{
					$hasil[]=$look;
				}
				return $hasil;
			}
		}
	}
	elseif($kategori=='product')
	{
		$this->db->like('title', $cari);
		$query=$this->db->get('product');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $look)
			{
				$hasil[]=$look;
			}
			return $hasil;
		}
		else
		{
			$this->db->like('description', $cari);
			$query=$this->db->get('product');
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $look)
				{
					$hasil[]=$look;
				}
				return $hasil;
			}
		} 
	}
	elseif($kategori=='blog')
	{
		$this->db->like('bl_name', $cari);
		$query=$this->db->get('blog');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $look)
			{
				$hasil[]=$look;
			}
			return $hasil;
		}
		else
		{
			$this->db->like('bl_title', $cari);
			$query=$this->db->get('blog');
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $look)
				{
					$hasil[]=$look;
				}
				return $hasil;
			}
			else
			{
				$this->db->like('bl_content', $cari);
				$query=$this->db->get('blog');
				if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $look)
					{
						$hasil[]=$look;
					}
					return $hasil;
				}
			}
		}
	}

 }
 
	public function getById($id,$kategori)
	{
		if($kategori=="news")
		{
			$this->db->where('id',$id);
			$query=$this->db->get('news');
			return $query->result();
		}
		if($kategori=="product")
		{
			$this->db->where('id',$id);
			$query=$this->db->get('product');
			return $query->result();
		}
		if($kategori=="blog")
		{
			$this->db->where('id',$id);
			$query=$this->db->get('blog');
			return $query->result();
		}
	}

}

